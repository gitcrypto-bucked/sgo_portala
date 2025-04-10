<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class TrackingModel extends Model
{
    #status_descricao atualizacao dos correios /transpordora
    # 0 andamento,  1 entregue , 2 cancalado

    #tracking code null-> postado
    #tracking code null  & status ==2> postado   dot cancalado
    #tracking code !null & status !=1 -> transporte
    #tracking code !null & status ==2 -> transporte dot cancelado
    #status = 1  -> entregue

    public function  getTracking($clienteID)
     {
         //@deprecated altered 08/4
        //    return DB::select("SELECT
        //                     r.numero_pedido, r.nfe, r.data_faturamento, r.tracking_code, max(r.data_ocorrencia) as data, r.previsaoEntrega,
        //                     (SELECT status FROM rastreamento r2 WHERE r2.numero_pedido = r.numero_pedido ORDER BY data_ocorrencia DESC LIMIT 1) as st,
        //                     (SELECT id FROM rastreamento r2 WHERE r2.numero_pedido = r.numero_pedido ORDER BY data_ocorrencia DESC LIMIT 1) as id
        //                 FROM
        //                   rastreamento as r
        //                 GROUP BY numero_pedido, tracking_code, nfe, data_faturamento , previsaoEntrega");

            return DB::select("SELECT r.pedido_rastreamento, r.nfe_rastreamento, r.data_entrega_rastreamento, r.codigo_produto_rastreamento, max(r.data_faturamento_rastreamento) as data_faturamento_rastreamento, r.previsao_entrega_rastreamento,
                             (SELECT descricao_status_rastreamento FROM sgo_rastreamento r2 WHERE r2.pedido_rastreamento=r.pedido_rastreamento ORDER BY data_faturamento_rastreamento DESC LIMIT 1 ) as st,
                             (SELECT id_rastreamento FROM sgo_rastreamento r2 WHERE r2.pedido_rastreamento = r.pedido_rastreamento ORDER BY data_faturamento_rastreamento DESC LIMIT 1) as id
                             FROM sgo_rastreamento as r
                             GROUP BY data_entrega_rastreamento, pedido_rastreamento , codigo_rastreamento , nfe_rastreamento, data_faturamento_rastreamento, previsao_entrega_rastreamento, codigo_produto_rastreamento
                                ");
            #return DB::table('sgo_rastreamento')->selectRaw(' sgo_rastreamento.descricao_status_rastreamento as st, sgo_rastreamento.* ')->paginate(33);


     }

    public function getTrackingEquipamento($id_equipamento)
    {
        $SQL ="SELECT r.data_entrega_rastreamento, r.pedido_rastreamento, r.nfe_rastreamento, r.codigo_produto_rastreamento, max(r.data_faturamento_rastreamento) as data_faturamento_rastreamento, r.previsao_entrega_rastreamento,
        (SELECT descricao_status_rastreamento FROM sgo_rastreamento r2 WHERE r2.pedido_rastreamento=r.pedido_rastreamento ORDER BY data_faturamento_rastreamento DESC LIMIT 1 ) as st,
        (SELECT id_rastreamento FROM sgo_rastreamento r2 WHERE r2.pedido_rastreamento = r.pedido_rastreamento ORDER BY data_faturamento_rastreamento DESC LIMIT 1) as id
        FROM sgo_rastreamento as r
        WHERE r.id_equipamento = '".$id_equipamento."'
        GROUP BY data_entrega_rastreamento, pedido_rastreamento , codigo_rastreamento , nfe_rastreamento, data_faturamento_rastreamento, previsao_entrega_rastreamento, codigo_produto_rastreamento
           ";
        return DB::select($SQL);
    }


    public function getTrackingDetails($num_pedido)
    {
       //@deprecated altered 08/4
       # return DB::table("rastreamento")->where("numero_pedido",$num_pedido)->orderBy('data_ocorrencia','DESC')->get();
        return DB::table('sgo_rastreamento')->where('pedido_rastreamento', $num_pedido)->orderBy('previsao_entrega_rastreamento', "DESC")->limit('1')->get();
    }
}
