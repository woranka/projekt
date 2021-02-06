{extends file="main.tpl"}

{block name=content}
    
    <!-- Header -->
    <header id="head">
            <div class="container">
                <div class="row">
                    <h1 class="lead">TU ODKRYJESZ NOWE SMAKI</h1><br>
                </div>
                <div class="searchbox">
                    <form action="{$conf->action_url}start" class="pure-form">
                        <fieldset>
                            <input type="text" placeholder="Nazwa produktu..." name="product_name" value="{$searchForm->product_name}" />
                            <button type="submit" class="btn btn-action"><i class="fa fa-search"></i></button>
                        </fieldset>
                    </form>    
                </div>
            </div>
    </header>
    <!-- /Header -->

    <!-- Intro -->
    <div class="container text-center">
        <div class="col-md-12">
            <h3 class="text-center thin">Dostępne produkty: </h3></br>
            <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Nazwa produktu</th>
                        <th>Kategoria</th>
                        <th>Cena</th>
                        <th>Ilość</th>
                        <th>Dostępny</th>
                    </tr>
                </thead>
                <tbody>
                    {foreach $product as $p}
                    {strip}
                        <tr>
                            <td>{$p["product_name"]}</td>
                            <td>{$p["category"]}</td>
                            <td>{$p["price"]}</td>
                            <td>{$p["quantity"]}</td>
                            <td>{$p["status"]}</td>
                        </tr>
                    {/strip}
                    {/foreach}
                </tbody>
            </table>
            </div>
        </div>
    </div>
    <!-- /Intro-->

    <!-- Highlights - jumbotron -->
    <div class="jumbotron top-space">
        <div class="container">
            <h3 class="text-center thin">Polecane produkty <i class="fa fa-heart fa-5"></i></h3></br>

                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                  <!-- Indicators -->
                  <ol class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#myCarousel" data-slide-to="1"></li>
                    <li data-target="#myCarousel" data-slide-to="2"></li>
                  </ol>

                  <!-- Wrapper for slides -->
                  <div class="carousel-inner">
                    <div class="item active">
                      <img src="{$conf->app_url}/assets/images/sl1.png">
                    </div>

                    <div class="item">
                      <img src="{$conf->app_url}/assets/images/sl2.png">
                    </div>

                    <div class="item">
                      <img src="{$conf->app_url}/assets/images/sl3.png">
                    </div>
                  </div>

                  <!-- Left and right controls -->
                  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                    <span class="sr-only">Previous</span>
                  </a>
                  <a class="right carousel-control" href="#myCarousel" data-slide="next">
                    <span class="sr-only">Next</span>
                  </a>
                </div>

        </div>
    </div>
    <!-- /Highlights -->   
{/block}
