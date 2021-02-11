{extends file="main.tpl"}

{block name=content}
    <header id="head" class="secondary"></header> 
    <div class="container">
              
        <ol class="breadcrumb">
            <li><a href="{$conf->action_root}start">Start</a></li>
            <li class="active">Panel pracownika</li>
            <!--<span style="float:right;">użytkownik: {$this->login}, rola: {$this->role}</span>-->
        </ol>
        
        <div class="row">
            <article class="col-xs-12 maincontent">
                <header class="page-header">
                    <h1 class="page-title">Produkty </h1>
                </header>
                
                <div class="bottom-margin">
                    <h3 class="page-title">Wyszukaj: </h3>
                    <form action="{$conf->action_url}productList" class="form-inline">
                        <input type="text" placeholder="Nazwa produktu..." name="product_name" value="{$searchForm->product_name}" class="form-control" style="width: 27em"/>
                        <button type="submit" class="btn btn-action"><i class="fa fa-search"></i></button>
                    </form>
                </div>
                
                <div class="bottom-margin">
                    <a class="pure-button button-success" href="{$conf->action_root}productNew">+ nowy produkt</a>
                    <a class="pure-button button-error" href="{$conf->action_root}productList">lista</a>
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
                            <th>Nazwa produktu</th>
                            <th>Kategoria</th>
                            <th>Cena</th>
                            <th>Ilość</th>
                            <th>Dostępny</th>
                            <th>Opcje</th>
                        </tr>
                    </thead>
                    <tbody>
                        {foreach $product as $p}
                        {strip}
                            <tr>
                                <td>{$p["IDproduct"]}</td>
                                <td>{$p["product_name"]}</td>
                                <td>{$p["category"]}</td>
                                <td>{$p["price"]}</td>
                                <td>{$p["quantity"]}</td>
                                <td>{$p["status"]}</td>
                                <td>
                                    <a class="button-small pure-button button-secondary" href="{$conf->action_url}productEdit/{$p['IDproduct']}">Edytuj</a>
                                    &nbsp;
                                    <a class="button-small pure-button button-warning" href="{$conf->action_url}productDelete/{$p['IDproduct']}">Usuń</a>
                                    {if $p["status"] == 'T'}
                                        &nbsp;
                                        <a class="button-small pure-button button-success" href="{$conf->action_url}customerList?IDproduct={$p['IDproduct']}">Dodaj do zamówienia</a>
                                    {/if}
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
