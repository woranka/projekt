{extends file="main.tpl"}

{block name=content}
    <header id="head" class="secondary"></header> 
    <div class="container">
              
        <ol class="breadcrumb">
            <li><a href="{$conf->action_root}start">Start</a></li>
            <li class="active">Panel pracownika</li>
        </ol>
        
        <div class="row">
            <article class="col-xs-12 maincontent">
                <header class="page-header">
                    <h1 class="page-title">Zamówienia </h1>
                </header>
                
                <div class="bottom-margin">
                    <h3 class="page-title">Wyszukaj: </h3> 
                    <form action="{$conf->action_url}orderList" class="form-inline">
                        <input type="text" placeholder="ID klienta..." name="IDcustomer" value="{$searchForm->IDcustomer}" class="form-control" style="width: 27em"/>
                        <button type="submit" class="btn btn-action"><i class="fa fa-search"></i></button>
                    </form>
                </div>	
                <div class="bottom-margin">
                    <a class="pure-button button-error" href="{$conf->action_root}orderList">lista</a>
                </div>
                <div class="top-margin">
                {block name=messages}
                    {if $msgs->isMessage()}
                        <div class="messages">
                            <ul>
                            {foreach $msgs->getMessages() as $msg}
                            {strip}
                                <li class="msg {if $msg->isError()}error{/if} {if $msg->isWarning()}warning{/if} {if $msg->isInfo()}info{/if}">{$msg->text}</li>
                            {/strip}
                            {/foreach}
                            </ul>
                        </div>
                    {/if}
                {/block}
                </div>
                <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <!--<th>Numer zamówienia</th>-->
                            <th>Data zamówienia</th>
                            <th>Produkt</th>
                            <th>ID klienta</th>
                            <th>Pracownik</th>
                            <th>Wartość [ zł ]</th>
                            <th>Status</th>
                            <th>Opcje</th>
                        </tr>
                    </thead>
                    <tbody>
                        {foreach $order as $o}
                        {strip}
                            <tr>
                                <td>{$o["IDorder"]}</td>
                                <!--<td>{$o["order_number"]}</td>-->
                                <td>{$o["order_date"]}</td>
                                <td>{$o["product_name"]}</td>
                                <td>{$o["IDcustomer"]}</td>
                                <td>{$o["surname"]}</td>
                                <td>{$o["price"]}</td>
                                <td>{$o["status"]}</td>
                                <td>
                                    <a class="button-small pure-button button-secondary" href="{$conf->action_url}orderEdit/{$o['IDorder']}">Edytuj</a>
                                    &nbsp;
                                    <a class="button-small pure-button button-warning" href="{$conf->action_url}orderDelete/{$o['IDorder']}">Usuń</a>
                                </td>
                            </tr>
                        {/strip}
                        {/foreach}
                    </tbody>
                </table>
                </div> 
            </article>
        </div>
    </div>
{/block}

