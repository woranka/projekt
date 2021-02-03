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
                        <input type="text" placeholder="Numer zamówienia..." name="order_number" value="{$searchForm->order_number}" class="form-control" style="width: 27em"/>
                        <button type="submit" class="btn btn-action"><i class="fa fa-search"></i></button>
                    </form>
                </div>
                        
                <div class="bottom-margin">
                    <a class="pure-button button-success" href="{$conf->action_root}orderNew">+ nowe zamówienie</a>
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
                
                <table id="tab_people" class="pure-table pure-table-bordered">
                    <thead>
                        <tr>
                            <th>Numer zamówienia</th>
                            <th>Status</th>
                            <th>Opcje</th>
                        </tr>
                    </thead>
                    <tbody>
                        {foreach $order as $o}
                        {strip}
                            <tr>
                                <td>{$p["order_number"]}</td>
                                <td>{$p["order_completed"]}</td>
                                <td>
                                    <a class="button-small pure-button button-secondary" href="{$conf->action_url}orderEdit/{$p['IDorder']}">Edytuj</a>
                                    &nbsp;
                                    <a class="button-small pure-button button-warning" href="{$conf->action_url}orderDelete/{$p['IDorder']}">Usuń</a>
                                </td>
                            </tr>
                        {/strip}
                        {/foreach}
                    </tbody>
                </table>
                   
            </article>
        </div>
    </div>
{/block}

