@php($perm = new App\Policies\PagePolicy())
@php($perm->userCan( Route::currentRouteName()))
    <!DOCTYPE html>
<html lang="pt_BR" >
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Ti team &amp; Low Cost contributors">
    <meta name="generator" content="Pedro Henrique & Washington">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Portal LowCost </title>
    <!--  <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'>-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
          crossorigin="anonymous">
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">


    <link rel="stylesheet" href="{{asset('/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('/css/dropdown.css')}}">
    <link rel="stylesheet" href="{{asset('/css/search.css')}}">
    <link rel="stylesheet" href="{{asset('/css/list.css')}}">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <style>
        .select2-container .select2-selection--single{
            height:34px !important;
        }
        .select2-container--default .select2-selection--single{

        }

        .btn_link, .btn_link:hover, .btn_link:active {
            border: none !important;
            outline: none !important;
            background-color: transparent !important;
        }
        .link, .link:hover, .link:visited {
            font-family: 'Poppins', sans-serif !important;
            font-size: 12px !important;
            color: #2079fe !important;
            font-weight: 550;
            text-decoration: underline !important;
            line-height: 0 !important;
            cursor: pointer !important;
        }

        .right {
            position: relative;
            background: #edde9a;
            -webkit-border-radius: 10px;
            -moz-border-radius: 10px;
            border-radius: 10px;
            height: 134px;
            width:90%;
            margin-top: 120px;

        }

        .left:before{
            content: "";
            position: absolute;
            top: 60px;
            right:-30px;
            z-index: 1;
            border: solid 15px transparent;
            border-right-color: #edde9a;
        }

        .left {
            position: relative;
            background:#edde9a;
            -webkit-border-radius: 10px;
            -moz-border-radius: 10px;
            border-radius: 10px;
            height: 134px;
            margin-top: 120px;

        }

        .right:before{
            content: "";
            position: absolute;
            top: 60px;
            left:-30px;
            z-index: 1;
            border: solid 15px transparent;
            border-right-color: #edde9a;
        }



        .right_alert{
            position: relative;
            background: #2e8bc0;
            -webkit-border-radius: 10px;
            -moz-border-radius: 10px;
            border-radius: 10px;
            height: 130px;
            width:90%;
            margin-top: 120px;
        }

        .right_alert:before{
            content: "";
            position: absolute;
            top: 60px;
            right:-29px;
            z-index: 1;
            border: solid 15px transparent;
            border-right-color: #2e8bc0;
            transform: rotate(180deg);
        }


        .left {
            position: relative;
            background:#edde9a;
            -webkit-borde-rradius: 10px;
            -moz-border-radius: 10px;
            border-radius: 10px;
            height: 134px;
            width:90%;

        }

        .left:before{
            content: "";
            position: absolute;
            top: 60px;
            right:-29px;
            z-index: 1;
            border: solid 15px transparent;
            border-right-color: #edde9a;
            transform: rotate(180deg);
        }

        td
        {
            border-bottom: none !important;
        }


    </style>
</head>
<body>
<!-- partial:index.partial.html -->
<div id="wrapper">
    <!--sidebar-->
    @include('components.sidebar')

    <!--sidebar-->
    <!--navbar -->
    @include('components.navwrapper')
    <!--content-->
    <div class="container-xxl mt-4 mobile  mb-4">
        <h2 class="content-title pageName">Inventário de Equipamentos e Serviços</h2>
        <p class="pageText">Veja abaixo todos os equipamentos e serviços que você possui com a LowCost. Utilzie a busca para encontrar os itens especificos!</p>
        @if($agent->isMobile()!=false)

            <!--search-->
                <div class="row gx-2 gy-2 mt-3 ">
                    <form method="post" action="{{ route('busca_invetario_detalhado')}}" class="row g-3">
                        @csrf
                        <div class="col-md-6">
                            <label for="cliente" class="form-label d-none d-lg-block">Cliente</label>
                            <select  class="form-control select2" id="cliente" name="cliente" data-hide-disabled="true" data-actions-box="true" data-virtual-scroll="false">
                                <option class="text-muted"  selected value="{!!  Helpers\Helpers::getUserCompanyName(Auth::user()->cliente) !!}">{!! strtoupper(Helpers\Helpers::getUserCompanyName(Auth::user()->cliente)) !!}</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="localidade" class="form-label d-none d-lg-block">Localidade</label>
                            <select  class="form-control select2" id="localidade" name="localidade"data-hide-disabled="true" data-actions-box="true" data-virtual-scroll="false">
                                <option class="text-muted" selected>{!! ucwords($localidade) !!}</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label for="modelo" class="form-label d-none d-lg-block">Modelo</label>
                            <select  class="form-control select2" id="modelo" name="modelo" data-hide-disabled="true" data-actions-box="true" data-virtual-scroll="false">
                                @if(gettype($modelo)=='array')
                                    <option value="">Selecione</option>
                                    @for($i=0; $i< sizeof($modelo); $i++)
                                        <option class="text-muted">{!! $modelo[$i]->modelo !!}</option>
                                    @endfor
                                @else
                                    <option class="text-muted">{!! $modelo!!}</option>
                                @endif
                            </select>

                        </div>
                        <div class="col-sm-3">
                            <label for="serial" class="form-label d-none d-lg-block">Serial</label>
                            <select  class="form-control select2" id="serial" name="serial" data-hide-disabled="true" data-actions-box="true" data-virtual-scroll="false">
                                <option value="">Selecione</option>
                                @for($i=0; $i< sizeof($serial); $i++)
                                    <option class="text-muted">{!! strlen(@ $serial[$i]->serial)?  @$serial[$i]->serial: $serial[$i] !!}</option>
                                @endfor
                            </select>
                        </div>
                        <div class="col-sm-3">
                            <label for="ced" class="form-label d-none d-lg-block">Centro de Custo</label>
                            <select  class="form-control select2" id="ced" name="ced" data-hide-disabled="true" data-actions-box="true" data-virtual-scroll="false">
                                <option value="">Selecione</option>
                                @if(gettype($cdc)=='array')
                                    @for($i=0; $i< sizeof($cdc); $i++)
                                        <option class="text-muted">{!! $cdc[$i]->cdc !!}</option>
                                    @endfor
                                @endif
                            </select>
                        </div>
                        <div class="col-md-4" >
                            <button type="submit" class="btn btn-primary float-end">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"></path>
                                </svg>
                                Buscar
                            </button>
                        </div>
                        <div class="col-sm-3">
                        </div>
                    </form>
                </div>
                </div>
        <!--search-->
        <!--content-->
            <div class="container-xxl mt-4 mobile ">
                <div id="accordion">
                 @for($i=0; $i<sizeof($inventario); $i++)
                        <div class="card mb-3" style="max-width:100%;" >
                            <div class="row g-0">
                                <div class="col-lg-10 ">
                                    <div class="card-body">
                                        <!--card body -->
                                        <div class="table-responsive mt-4">
                                            <table class=" table align-middle bg-white py-4 mt-2" style="border-bottom: none !important;">
                                                <tr>
                                                    <td class="text-secondary tdr px-2" colspan="2">Equipamento</td>
                                                    <td class="text-secondary tdr px-2">N° de Série</td>
                                                </tr>
                                                <tr>
                                                    <td class="modelo tdr" colspan="2" >{!! ucwords(strtolower( $inventario[$i]->modelo_equipamento)) !!}</td>
                                                    <td class="serial tdr px-2">{!! (strtoupper( $inventario[$i]->serial_equipamento)) !!}</td>
                                                </tr>
                                                <tr>
                                                    <td >
                                                        <button class="link mt-1 btn_link"  type="button"  name="submitbutton"
                                                                style="font-size: 14px" onclick="redirect('{{$inventario[$i]->serial_equipamento}}')">Detalhes</button>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endfor
                </div>
            </div>
            <div class="container-xxl mt-4 mobile ">
                    <div class="row">
                        <div  class='col-md-5'>
                            @if($inventario instanceof \Illuminate\Pagination\AbstractPaginator)
                                {{$inventario->withQueryString()->links()}}
                            @endif
                        </div>
                    </div>
            </div>

    <!--content-->
        @else
            <!--web-->
            <div class="row gx-5 gy-3 mt-3 ">
                    <form method="post" action="{{ route('busca_invetario_detalhado')}}" class="row g-3">
                        @csrf
                        <div class="col-md-6">
                            <label for="cliente" class="form-label d-none d-lg-block">Cliente</label>
                            <select  class="form-control select2" id="cliente" name="cliente" data-hide-disabled="true" data-actions-box="true" data-virtual-scroll="false">

                                <option class="text-muted"  selected value="{!!  Helpers\Helpers::getUserCompanyName(Auth::user()->id_cliente) !!}">{!! strtoupper(Helpers\Helpers::getUserCompanyName(Auth::user()->id_cliente)) !!}</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="localidade" class="form-label d-none d-lg-block">Localidade</label>
                            <select  class="form-control select2" id="localidade" name="localidade"data-hide-disabled="true" data-actions-box="true" data-virtual-scroll="false">
                                <option class="text-muted" selected>{!! ucwords($localidade) !!}</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label for="modelo" class="form-label d-none d-lg-block">Modelo</label>
                            <select  class="form-control select2" id="modelo" name="modelo" data-hide-disabled="true" data-actions-box="true" data-virtual-scroll="false">
                                @if(gettype($modelo)=='array')
                                    <option value="">Selecione</option>
                                    @for($i=0; $i< sizeof($modelo); $i++)
                                        <option class="text-muted" @if(isset($model)) selected @endif">{!! $modelo[$i]->modelo_equipamento !!}</option>
                                    @endfor
                                @else
                                    <option class="text-muted">{!! $modelo!!}</option>
                                @endif
                            </select>
                            @if(gettype($localidade)!='array')
                                <a href="{{route('inventario')}}" style="color:black; padding:5px !important
                                    "><i class="fa fa-backward fa-lg" aria-hidden="true" ></i></a>
                            @endif
                        </div>
                        <div class="col-sm-3">
                            <label for="serial" class="form-label d-none d-lg-block">Serial</label>
                            <select  class="form-control select2" id="serial" name="serial" data-hide-disabled="true" data-actions-box="true" data-virtual-scroll="false">
                                <option value="">Selecione</option>
                                @for($i=0; $i< sizeof($serial); $i++)
                                    <option class="text-muted">{!! strlen(@ $serial[$i]->serial_equipamento)?  @$serial[$i]->serial_equipamento: $serial[$i] !!}</option>
                                @endfor
                            </select>
                        </div>
                        <div class="col-sm-3">
                            <label for="ced" class="form-label d-none d-lg-block">Centro de Custo</label>
                            <select  class="form-control select2" id="ced" name="ced" data-hide-disabled="true" data-actions-box="true" data-virtual-scroll="false">
                                <option value="">Selecione</option>
                                @if(gettype($cdc)=='array')
                                    @for($i=0; $i< sizeof($cdc); $i++)
                                        <option class="text-muted">{!! $cdc[$i]->cdc !!}</option>
                                    @endfor
                                @endif
                            </select>
                        </div>
                        <div class="col" >
                            <button type="submit" class="btn btn-primary float-end">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"></path>
                                </svg>
                                Buscar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="container-xxl mt-4 mobile ">
                <div class="row">
                    <!-- content -->
                    @for($i=0; $i<sizeof($inventario); $i++)
                        <div class="card mb-3" style="max-width:100%;" >
                            <div class="row g-0">
                                <div class="col-lg-9 ">
                                    <div class="card-body">
                                        <!--card body -->
                                        <div class="table-responsive mt-4">
                                            <table class=" table align-middle bg-white py-4 mt-2" style="border-bottom: none !important;">
                                                <tr>
                                                    <td class="text-secondary tdr px-2" colspan="2">Equipamento</td>
                                                    <td class="text-secondary tdr px-2">N° de Série</td>
                                                    <td class="text-secondary tdr px-2">IP do Equipamento</td>
                                                    <td class="text-secondary tdr px-2">Centro de Custo</td>
                                                    <td class="text-secondary tdr">Situação</td>
                                                    <td class="px-2"></td>
                                                </tr>
                                                <tr>
                                                    <td class="modelo tdr" colspan="2" >{!! ucwords(strtolower( $inventario[$i]->modelo_equipamento)) !!}</td>
                                                    <td class="serial tdr px-2">{!! (strtoupper( $inventario[$i]->serial_equipamento)) !!}</td>
                                                    <td class="serial tdr px-2" >&nbsp;{!! strlen(@$inventario[$i]->ip_equipamento) ? $inventario[$i]->ip_equipamento : "Sem comunicação ".'<br>'."  com o PrintWayy" !!}</td>
                                                    <td class="serial tdr px-2">{!! strlen( @$inventario[$i]->cdc)?  @$inventario[$i]->cdc : 'C.D.C'  !!}</td>
                                                    <td class="serial tdr"  colspan="2">{!! strlen($inventario[$i]->status_equipamento)? $inventario[$i]->status_equipamento: 'Impressora sem comunicação com o PrintWayy' !!}</td>
                                                    <td class="px-2"></td>
                                                </tr>
                                                <tr>
                                                    <td class="text-secondary tdr px-2">N° Contrato</td>
                                                    <td class="text-secondary tdr px-2">Início Contrato</td>
                                                    <td class="text-secondary tdr px-2">Término Contrato</td>
                                                    <td class="text-secondary tdr px-2">Nível Suprimentos</td>
                                                    <td class="text-secondary tdr px-2">Total pag. Impressas(dia)</td>
                                                    <td class="text-secondary tdr px-2">Total pag. Impressas(Mês)</td>
                                                </tr>
                                                <tr>
                                                    <td class="serial tdr px-2" >@if($inventario[$i]->contrato_equipamento==""){!! "----------" !!}@else{!! (strtoupper( $inventario[$i]->contrato_equipamento)) !!}@endif</td>
                                                    <td class="serial tdr px-2">{!!  stripos($inventario[$i]->inicio_contrato_equipamento,'0000-00-00 00:00:00')? date('d/m/Y', strtotime(str_replace('-','/',$inventario[$i]->inicio_contrato_equipamento)))  : '--/--/----' !!} </td>
                                                    <td class="serial tdr px-2">{!!  stripos($inventario[$i]->fim_contrato_equipamento,'0000-00-00 00:00:00')? date('d/m/Y', strtotime(str_replace('-','/',$inventario[$i]->fim_contrato_equipamento)))  : '--/--/----' !!}</td>
                                                    <td class="serial tdr px-2">{!!  strlen(@$inventario[$i]->nivel_suprimento)? @$inventario[$i]->nivel_suprimento."%" : '-----' !!}</td>
                                                    <td class="serial tdr px-2">{!!  strlen(@$inventario[$i]->paginas_dia)? @$inventario[$i]->paginas_dia : 000!!}</td>
                                                    <td class="serial tdr px-2">{!!  strlen(@$inventario[$i]->paginas_mes)? @$inventario[$i]->paginas_mes : 000   !!}</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-secondary tdr px-2">Endereço</td>
                                                    <td class="text-secondary tdr px-2"  colspan="2">Telefone</td>
                                                    <td class="px-2"></td>
                                                    <td class="px-2"></td>
                                                    <td class="px-2"></td>
                                                    <td class="px-2"></td>
                                                </tr>
                                                <tr>
                                                    <td class="serial tdr px-2" >{!! strlen(strtolower(@$inventario[$i]->endereco_localidade)) ? ucwords(strtolower(@$inventario[$i]->endereco_localidade)) : "Rua das Tordesilhas"!!}</td>
                                                    <td class="serial tdr px-2" >{!! strlen(@$inventario[$i]->responsavel_localidade) ? @$inventario[$i]->responsavel_localidade : "----" !!}</td>
                                                    <td class="px-2"></td>
                                                    <td class="px-2"></td>
                                                    <td class="px-2"></td>
                                                    <td class="px-2"></td>

                                                </tr>
                                                <tr>
                                                    <td class="text-secondary tdr px-2" >Cidade</td>
                                                    <td class="text-secondary tdr px-2" >UF</td>
                                                    <td class="px-2"></td>
                                                    <td class="px-2"></td>
                                                </tr>
                                                <tr>
                                                    <td class="serial tdr px-2" >{!! strlen(strtolower(@$inventario[$i]->cidade_localidade))? ucfirst(\Helpers\Helpers::formatCidade(strtolower(@$inventario[$i]->cidade_localidade))) : "São Paulo" !!}</td>
                                                    <td class="serial tdr px-2">{!! strlen(@$inventario[$i]->estado_localidade)? @$inventario[$i]->estado_localidade : "SP" !!} </td>
                                                    <td class=" serial " colspan="3">
                                                       
                                                    </td>
                                                    <td class=""></td>
                                                </tr>
                                            </table>
                                        </div>
                                    

                                        <!--card body end-->
                                    </div>
                                </div>
                                <div class="col-md-2 ml-2 "  style="margin-top: 2%">
                                    @if( $inventario[$i]->imagem_equipamento!=null ||  $inventario[$i]->imagem_equipamento!='')
                                        <img src="{!! $inventario[$i]->imagem_equipamento !!}" class="img-fluid rounded-start pb-0 mt-2 py-2" alt="..." width="201" height="201">
                                    @else
                                        <img src="{{ asset('img/no_image.png') }}" class="img-fluid rounded-start pb-0  mt-2 py-2" alt="..." width="201" height="201" style="opacity: 0.7 !important">
                                    @endif
                                    <button type="button" class="btn round-btn text-white mb-4  pt-1 ml-4 small-text ml-2" 
                                            style="margin-top: 13px" onclick="details('{!! $inventario[$i]->id_equipamento!!}')">Detalhes do Equipamento</button>
                                </div>
                                <div class="col-sm-1 ">
                                    <div class="btn-group-vertical  " role="group" aria-label="Vertical button group" style="padding-top:40% !important">
                                        <button type="button" class="btn btn-info mb-3 rounded-1 @if(isset(Auth::user()->abrir_chamado) && boolval(Auth::user()->abrir_chamado)) d-block @else d-none @endif" 
                                            class="btn btn-secondary"  onclick="abrirChamado('{!! $inventario[$i]->serial_equipamento!!}','{{ base64_decode($_GET['localidade']) }}')"
                                            data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Chamado">
                                            <i class="fa fa-gear  fa-lg" style="color:white"></i>
                                        </button>
                                        <button type="button" class="btn btn-info mb-3 mt-3 rounded-1" 
                                            class="btn btn-secondary"   data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Rastreamento"
                                            onclick="rastreamento('{!! $inventario[$i]->id_equipamento!!}')">
                                            <i class="fa fa-truck fa-lg" style="color:white"></i>
                                        </button>    
                                        <button type="button" class="btn btn-info mb-3 mt-3 rounded-1" 
                                        class="btn btn-secondary"   data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Rastreamento"
                                        onclick="faturamento('{!! $inventario[$i]->id_equipamento!!}')">
                                        <i class=" fa fa-money fa-lg" style="color:white"></i>
                                    </button>    
                                      </div>
                                </div>
                            </div>
                        </div>
                    @endfor
                    <!--end content-->
                </div>
            </div>
            <div class="container-xxl mt-4 mobile ">
                <div class="row">
                    <div  class='col-lg-8'>
                        @if($inventario instanceof \Illuminate\Pagination\AbstractPaginator)
                            {{$inventario->withQueryString()->links()}}
                        @endif
                    </div>
                </div>
            </div>
        @endif
    <!--wrapper-->
    <!--modal-->
    <div class="modal modal-lg" tabindex="-1" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-body">
                    <button type="button" class="btn-close float-end" data-bs-dismiss="modal" aria-label="Close"></button>
                    <!-- Tabs n avs -->
                    <div class="w3-row">
                        <a href="javascript:void(0)" onclick="openCity(event, 'Gerais');">
                            <div class="w3-third tablink w3-bottombar w3-hover-light-grey w3-padding">Dados Gerais</div>
                        </a>
                        <a href="javascript:void(0)" onclick="openCity(event, 'Impressao');">
                            <div class="w3-third tablink w3-bottombar w3-hover-light-grey w3-padding">Impressão</div>
                        </a>
                        <a href="javascript:void(0)" onclick="openCity(event, 'Historico');">
                            <div class="w3-third tablink w3-bottombar w3-hover-light-grey w3-padding">Histórico de Troca</div>
                        </a>
                    </div>

                    <div id="Gerais" class="w3-container city" style="display:block">
                        <p class="btn-nav mt-4 text-center">Contadores Gerais</p>
                        <table class="table table-striped" id="totais">
                            <thead>
                            <tr>
                                <th scope="col" colspan="2" class="text-center">Total</th>
                                <th scope="col" class="text-center">Última Leitura</th>
                            </tr>
                            </thead>

                        </table>
                        <p class="btn-nav mt-4 text-center">Suprimento</p>
                        <table class="table table-striped" id="suprimentos">
                            <thead>
                            <tr>
                                <th scope="col" class="text-center">Descrição</th>
                                <th scope="col" colspan="2" class="text-center">Nivel informado pela impressoa</th>
                                <th scope="col" class="text-center">Última Leitura</th>
                            </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>

                    <div id="Impressao" class="w3-container city" style="display:none">
                        <h2>Impressão</h2>
                        <div class=" row mb-2 mt-2 ">
                            <div class="d-flex bd-h-40">
                                <canvas id="print"></canvas>
                            </div>
                        </div>
                    </div>

                    <div id="Historico" class="w3-container city" style="display:none">
                        <div class=" row mb-2 mt-2 ">
                            <div class="d-flex bd-h-80">
                                <div class="col " id="left_div" style="font-size: 10px; color:gray">
                                    <!--info-->
                                    <div class="col right_alert" id="alert" style="display: none !important; margin-top: 20px !important;">
                                        <div style="padding: 18px !important;" class="pt-2">
                                            <h4 class="alert-heading "></h4>
                                            <p class="px-4" style="color:white;font-size: 12px">Não conseguimos encontrar dados dessa impressoa<p>
                                        </div>
                                    </div>
                                    <!--- info -->

                                </div>
                                <div class="col " id="right_div" style="  border-left: 5px solid rgba(134, 139, 142, 0.5);    padding-left: 1.8rem !important;font-size: 10px; color:gray">

                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end -->
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>

    <!--modal end -->
</div>
</body>
<script  src="{{asset('/js/script.js')}}"></script>
<script  src="{{asset('/js/main.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
        crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script src="
https://cdn.jsdelivr.net/npm/chart.js@4.4.7/dist/chart.umd.min.js
"></script>
<script type="text/javascript">

    function redirect(serial)
    {
        let url ="{{route('detalhes_mobile')}}";
        window.location.href=url+"?serial="+btoa(serial)+"&token_="+"{{@csrf_token()}}"
    }



    function openCity(evt, cityName) {
        var i, x, tablinks;
        x = document.getElementsByClassName("city");
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablink");
        for (i = 0; i < x.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" w3-border-cyan", "");
        }
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.firstElementChild.className += " w3-border-cyan";
    }

    function  details(serials)
    {
        document.getElementsByClassName("tablink")[0].click();
        getGraph(serials);
        Monitoramento(serials);
        getTotals(serials);
        getSuprimentos(serials);


    }

    function Monitoramento(serial) {
        let URL = '{{route('monitoramento_detalhe')}}' + '?id_equipamento=' + serial + '&_token=' + '{!! @csrf_token() !!}';
        $.ajax({
            url: URL,
            type: "get",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (res) {
                removeElementsByClass('right');
                removeElementsByClass('left');
                resp = JSON.parse(res);
                if (resp.status == 200) {
                    console.log(resp.data)
                    if( resp.data.length != 0)
                    {
                        let data = resp.data;

                        // <div class="col right_alert" id="alert" style="display: none !important;">
                        //     <div style="padding: 18px !important;" class="pt-2">
                        //         <h4 class="alert-heading "></h4>
                        //         <p class="px-4">Não conseguimos encontrar dados dessa impressoa<p>
                        //     </div>
                        // </div>

                        document.getElementById('alert').style.display="none";
                        document.getElementById('alert').style.visibility="hidden";
                        const right = document.getElementById('right_div');
                        const left  = document.getElementById('left_div');
                        for(let i=0; i<data.length; i++)
                        {
                            console.log(i, i%2);
                            console.log(data[i]);

                            if (i%2 != 0)
                            {
                                div = document.createElement('div');
                                div.classList.add("col");
                                div.classList.add("left");
                                div.classList.add("mb-2");
                                div.classList.add("px-2");

                                p = document.createElement('p');
                                p.style.fontWeight=660;
                                p.innerHTML= 'Inicio de monitoramento de um item';
                                p.style.backgroundColor="#f7e59d";
                                p.style.height='30px';
                                p.style.marginBottom = "10px";
                                p.style.padding ="5px"

                                div.append(p);

                                ul = document.createElement('ul');
                                ul.style.listStyle="none";
                                ul.style.fontSize="11px";
                                ul.classList.add("py-2");


                                li =  document.createElement('li');
                                li.style.lineHeight='1';
                                li.style.fontSize="11px";
                                li.innerHTML = '<p style="font-weight: 450">'+"Descrição:<bold> "+data[i]['item']+"<bold></p>";
                                ul.append(li);

                                li =  document.createElement('li');
                                li.style.lineHeight='1';
                                li.style.fontSize="11px";
                                li.innerHTML = '<p style="font-weight: 450">'+"Tipo:<bold>"+data[i]['tipo']+"<bold></p>";
                                ul.append(li);


                                li =  document.createElement('li');
                                li.style.lineHeight='1';
                                li.style.fontSize="11px";
                                li.innerHTML = '<p style="font-weight: 450">'+"Nível : <bold>"+data[i]['nivel_suprimento']+"%"+"<bold></p>";
                                ul.append(li);

                                li =  document.createElement('li');
                                li.style.lineHeight='1';
                                li.style.fontSize="11px";
                                ul.append(li);

                                // li =  document.createElement('li');
                                // li.style.lineHeight='1';
                                // li.style.fontSize="11px";
                                // li.innerHTML = '<p>'+data[i]['ultima_leitura']+"</p>";
                                // ul.append(li);
                                p = document.createElement('p');
                                p.classList.add("text-muted");
                                p.innerHTML=data[i]['ultima_leitura'];

                                div.append(ul);
                                left.append(div);
                                left.append(p);


                            }
                            else
                            {
                                if(i===0)
                                {
                                    div = document.createElement('div');
                                    div.classList.add("col");
                                    div.classList.add("left");
                                    div.classList.add("mb-2");
                                    div.classList.add("px-2");
                                    div.style.marginTop="0px";

                                    p = document.createElement('p');
                                    p.style.fontWeight=660;
                                    p.innerHTML= 'Inicio de monitoramento de um item';
                                    p.style.backgroundColor="#f7e59d";
                                    p.style.height='30px';
                                    p.style.marginBottom = "10px";
                                    p.style.padding ="5px"

                                    div.append(p);

                                    ul = document.createElement('ul');
                                    ul.style.listStyle="none";
                                    ul.style.fontSize="11px";
                                    ul.classList.add("py-2");

                                    li =  document.createElement('li');
                                    li.style.lineHeight='1';
                                    li.style.fontSize="11px";
                                    li.innerHTML = '<p style="font-weight: 450">'+"Descrição: "+data[i]['item']+"</p>";
                                    ul.append(li);

                                    li =  document.createElement('li');
                                    li.style.lineHeight='1';
                                    li.style.fontSize="11px";
                                    li.innerHTML = '<p style="font-weight: 450">'+"Tipo: "+data[i]['tipo']+"</p>";
                                    ul.append(li);

                                    // li =  document.createElement('li');
                                    // li.style.lineHeight='1';
                                    // li.style.fontSize="11px";
                                    // li.innerHTML = '<p style="font-weight: 450">'+"Número de série: "+data[i]['serial_impressora']+"</p>";
                                    // ul.append(li);

                                    li =  document.createElement('li');
                                    li.style.lineHeight='1';
                                    li.style.fontSize="11px";
                                    li.innerHTML = '<p style="font-weight: 450">'+"Nível : "+data[i]['nivel_suprimento']+"%"+"</p>";
                                    ul.append(li);


                                    // li =  document.createElement('li');
                                    // li.style.fontSize="11px";
                                    // li.innerHTML = '<p>'+data[i]['ultima_leitura']+"</p>";
                                    // ul.append(li);

                                    p = document.createElement('p');
                                    p.classList.add("text-muted");
                                    p.innerHTML=data[i]['ultima_leitura'];

                                    div.append(ul);
                                    left.append(div);
                                    left.append(p);

                                }
                                div = document.createElement('div');
                                div.classList.add("col");
                                div.classList.add("right");
                                div.classList.add("mb-2");
                                div.classList.add("px-2");

                                p = document.createElement('p');
                                p.style.fontWeight=660;
                                p.innerHTML= 'Inicio de monitoramento de um item';
                                p.style.backgroundColor="#f7e59d";
                                p.style.height='30px';
                                p.style.marginBottom = "10px";
                                p.style.padding ="5px"

                                div.append(p);

                                ul = document.createElement('ul');
                                ul.style.listStyle="none";
                                ul.style.fontSize="11px";
                                ul.classList.add("py-2");


                                li =  document.createElement('li');
                                li.style.lineHeight='1';
                                li.style.fontSize="11px";
                                li.innerHTML = '<p style="font-weight: 450">'+"Descrição:<bold>"+data[i]['item']+"<bold></p>";
                                ul.append(li);

                                li =  document.createElement('li');
                                li.style.fontSize="11px";

                                li.innerHTML = '<p style="font-weight: 450">'+"Tipo:<bold>"+data[i]['tipo']+"<bold></p>";
                                ul.append(li);

                                // li =  document.createElement('li');
                                // li.style.lineHeight='1';
                                // li.style.fontSize="11px";
                                // li.innerHTML = '<p style="font-weight: 450">'+"Número de série:<bold>"+data[i]['serial_impressora']+"<bold></p>";
                                // ul.append(li);

                                li =  document.createElement('li');
                                li.style.lineHeight='1';
                                li.style.fontSize="11px";
                                li.innerHTML = '<p style="font-weight: 450">'+"Nível : <bold>"+data[i]['nivel_suprimento']+"%"+"<bold></p>";
                                ul.append(li);

                                //
                                // li =  document.createElement('li');
                                // li.style.lineHeight='1';
                                // li.style.fontSize="11px";
                                // li.innerHTML = '<p>'+data[i]['ultima_leitura']+"</p>";
                                // ul.append(li);

                                p = document.createElement('p');
                                p.classList.add("text-muted");
                                p.innerHTML=data[i]['ultima_leitura'];

                                div.append(ul);
                                right.append(div);
                                right.append(p);

                            }
                        }

                    }
                    if ( resp.data.length === 0)
                    {

                            document.getElementById('alert').style.display="block";
                        document.getElementById('alert').style.visibility="visible";

                    }
                }
            }
        });
    }

    function removeElementsByClass(className) {
        let elements = document.getElementsByClassName(className);
        while(elements.length > 0) {
            elements[0].parentNode.removeChild(elements[0]);
            elements[0].innerHTML=''
        }
    }

    function getSuprimentos(serial)
    {
       let URL =   '{{route('suprimentos_detalhe')}}'+'?id_equipamento='+serial+'&_token='+'{!! @csrf_token() !!}';
        $.ajax({
            url: URL,
            type: "get",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(res) {
                    resp = JSON.parse(res);
                    if(resp.status==200)
                    {
                        let data = resp.data;

                        var table = document.getElementById("suprimentos");

                        console.log(data);
                        for(let i =0 ; i<data.length; i++)
                        {
                            var row = table.insertRow();


                            row .classList.add('text-center');

                            var cell1 = row.insertCell(0);
                            var cell2 = row.insertCell(1);
                            var cell3 = row.insertCell(2);

                            cell1.classList.add('text-center');
                            cell2.classList.add('text-center');
                            cell1.style.marginLeft="5%";
                            cell2.colSpan = 2;
                            cell3.classList.add('text-center');

                            cell1.innerHTML =capitalizeFirstLetter( data[i]['descricao']);
                            cell2.innerHTML = data[i]['nivel_suprimento']+"%";
                            cell3.innerHTML = data[i]['ultima_leitura'];
                        }
                        $("#myModal").modal('toggle');

                    }
            }
        });

    }


    function capitalizeFirstLetter(val) {
        return String(val).charAt(0).toUpperCase() + String(val).slice(1);
    }


    function getGraph(serial)
    {
        let URL =   '{{route('monitoramento_grafico')}}'+'?id_equipamento='+serial+'&_token='+'{!! @csrf_token() !!}';
        $.ajax({
            url: URL,
            type: "get",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (res) {
                resp = JSON.parse(res);
                if(resp.status==200)
                {
                    showGraph(resp.meses, resp.data)
                }
            }
        });
    }

    function showGraph(label, datasets)
    {
        if(myChart!=null){
            myChart.destroy();
        }
        const data = {
            labels: label   ,
            datasets: [{
                label: 'Total de páginas',
                data: datasets,
                fill: false,
                borderColor: 'rgb(75, 192, 192)',
                tension: 0.1
            }]
        };
        const config = {
            type: 'line',
            data: data,
        };
        var ctx = document.getElementById("print");

        var myChart = new Chart(ctx,config);

    }



    function getTotals(serial)
    {
        let URL = '{{route('impressao-contadores')}}' + '?id_equipamento=' + serial + '&_token=' + '{!! @csrf_token() !!}';
        console.log(URL);
        $.ajax({
            url: URL,
            type: "get",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (res)
            {
                resp = JSON.parse(res);
                if(resp.status==200)
                {
                    i=0;
                    console.log(resp.data)
                    data =resp.data;
                    var table = document.getElementById("totais");
                    var row = table.insertRow();


                    row .classList.add('text-center');

                    var cell1 = row.insertCell(0);
                    var cell2 = row.insertCell(1);

                    cell1.classList.add('text-center');
                    cell2.classList.add('text-center');
                    cell1.style.marginLeft="5%";
                    cell2.colSpan = 2;

                    cell1.innerHTML =data['total'].toLocaleString(
                        undefined, // leave undefined to use the visitor's browser
                        // locale or a string like 'en-US' to override it.
                        { minimumFractionDigits: 0 }
                    );;
                    cell2.innerHTML = data['data'];
                }
            }
        });
    }

     function abrirChamado(serial,localidade)
     {
        let URL = '{{route('abrir_chamado')}}' + '?serial=' + btoa(serial)+ "&localidade="+btoa(localidade) + '&token=' + '{!! @csrf_token() !!}';
        window.location.href = URL;
     }

     function rastreamento(id_equipamento)
     {
        let URL = '{{route('tracking')}}' + '?id_equipamento=' + btoa(id_equipamento)+ '&token=' + '{!! @csrf_token() !!}';
        window.location.href = URL;
     }


    $(function() {
        $('[data-toggle="tooltip"]').tooltip();

    });
    $('.select2').select2();

</script>
</html>
