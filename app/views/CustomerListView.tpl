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
                    <h1 class="page-title">Klienci </h1>
                </header>
                
                <div class="bottom-margin">
                    <h3 class="page-title">Wyszukaj: </h3>
                    <form action="{$conf->action_url}customerList" class="form-inline">
                        <input type="text" placeholder="Nazwisko..." name="surname" value="{$searchForm->surname}" class="form-control" style="width: 27em"/>
                        <button type="submit" class="btn btn-action"><i class="fa fa-search"></i></button>
                    </form>
                </div>
                
                <div class="bottom-margin">
                    <a class="pure-button button-success" href="{$conf->action_root}customerNew">+ nowy klient</a>
                    <a class="pure-button button-error" href="{$conf->action_root}customerList">lista</a>
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
                <table class='table'>
                    <thead>
                        <tr>
                            <th>Nazwisko</th>
                            <th>Imię</th>
                            <th>Nr telefonu</th>
                            <th>Email</th>
                            <th>Miasto</th>
                            <th>Kod pocztowy</th>
                            <th>Ulica</th>
                            <th>Nr budynku</th>
                            <th>Nr lokalu</th>
                            <th>Opcje</th>
                        </tr>
                    </thead>
                    <tbody>
                        {foreach $customer as $c}
                        {strip}
                            <tr>
                                <td>{$c["surname"]}</td>
                                <td>{$c["name"]}</td>
                                <td>{$c["phone_number"]}</td>
                                <td>{$c["email"]}</td>
                                <td>{$c["city"]}</td>
                                <td>{$c["postal_code"]}</td>
                                <td>{$c["street_name"]}</td>
                                <td>{$c["street_number"]}</td>
                                <td>{$c["house_number"]}</td>
                                <td style='display:flex'>
                                    <a class="button-small pure-button button-secondary" href="{$conf->action_url}customerEdit/{$c['IDcustomer']}">Edytuj</a>
                                    &nbsp;
                                    <a class="button-small pure-button button-warning" href="{$conf->action_url}customerDelete/{$c['IDcustomer']}">Usuń</a>
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

