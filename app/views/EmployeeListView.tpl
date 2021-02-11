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
                    <h1 class="page-title">Pracownicy </h1>
                </header>
                
                <div class="bottom-margin">
                    <h3 class="page-title">Wyszukaj: </h3>
                    <form action="{$conf->action_url}employeeList" class="form-inline">
                        <input type="text" placeholder="Nazwisko..." name="surname" value="{$searchForm->surname}" class="form-control" style="width: 27em"/>
                        <button type="submit" class="btn btn-action"><i class="fa fa-search"></i></button>
                    </form>
                </div>
                
                <div class="bottom-margin">
                    <a class="pure-button button-success" href="{$conf->action_root}employeeNew">+ nowy pracownik</a>
                    <a class="pure-button button-error" href="{$conf->action_root}employeeList">lista</a>
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
                            <th>ID</th>
                            <th>Nazwisko</th>
                            <th>Imię</th>
                            <th>Nr telefonu</th>
                            <th>Email</th>
                            <th>Data zatrudnienia</th>
                            <th>Login</th>
                            <th>Hasło</th>
                            <th>Rola</th>
                            <th>Opcje</th>
                            <!--<th>Zamówienia</th>-->
                        </tr>
                    </thead>
                    <tbody>
                        {foreach $employee as $e}
                        {strip}
                            <tr>
                                <td>{$e["IDemployee"]}</td>
                                <td>{$e["surname"]}</td>
                                <td>{$e["name"]}</td>
                                <td>{$e["phone_number"]}</td>
                                <td>{$e["email"]}</td>
                                <td>{$e["hire_date"]}</td>
                                <td>{$e["login"]}</td>
                                <td>{$e["password"]}</td>
                                <td>{$e["role"]}</td>
                                <td style='display:flex'>
                                    <a class="button-small pure-button button-secondary" href="{$conf->action_url}employeeEdit/{$e['IDemployee']}">Edytuj</a>
                                    &nbsp;
                                    <a class="button-small pure-button button-warning" href="{$conf->action_url}employeeDelete/{$e['IDemployee']}">Usuń</a>
                                </td>
                                <!--<td>
                                    {if !($c["IDorder"] == '')}
                                        Nr zamówienia: []
                                        <a class="button-small pure-button button-primary" href="{$conf->action_root}orderList?IDcustomer={$c["IDcustomer"]}">Szczegóły</a>
                                    {else if (!({$IDproduct} == '')) && ({$c["IDorder"]} == '')}
                                        <a class="button-small pure-button" href="{$conf->action_root}orderSave?IDcustomer={$c["IDcustomer"]}&IDproduct={$IDproduct}">Wybierz</a>
                                    {/if}
                                </td>-->
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


