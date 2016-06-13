<?php get_header();

  if(!(is_front_page())) {
	  $wd_page_show_title_area = get_post_meta(get_the_ID(), 'wd_page_show_title_area', true);
	  
  	if($wd_page_show_title_area != 'no'){
		  get_template_part('titlebar');
		}
	}  ?>
  
  <style type="text/css">
  .titulo1a {
    background-color: #071c2c;
    color: #FFF;
    margin-right: 30px;
    padding: 15px 20px;
    margin-bottom: 15px;
  }
  .grupo1 {
    border-bottom: dotted 1px #071c2c;
    margin-bottom: 50px;
  }

  </style>
  <!-- content  -->
	<main class="l-main">
		<div class="main row">
		  <?php if (have_posts()) :
       while (have_posts()) : the_post(); ?>    
  			<article>
  				<div class="body field">
  					<?php // the_content(); ?>
            <div style="background-image: url('/wp-content/uploads/2016/06/bg-servicos2.jpg'); height: 200px; width: 100%; margin-top: -30px; background-size: cover; background-repeat: no-repeat; margin-bottom: 30px;" /></div>


            <div class="grupo1">

              <div style="float: left; width: 25%;">
                    <div class="titulo1a">SERVIÇOS CORPORATIVOS</div>
              </div>

              <div style="float: left; width: 75%;">
                    Oferecemos os mais diversos serviços para a sua empresa, com uma equipe qualificada e especializada para garantir a maior qualidade no atendimento.
                    <p>
                    Oferecemos:
                    <ul>
                      <li>Portaria</li> 
                      <li>Zeladoria</li> 
                      <li>Concierge e Recepção</li> 
                      <li>Manutenção Predial</li> 
                      <li>Jardinagem e Paisagismo</li> 
                      <li>Copa e Cozinha</li> 
                      <li>Limpeza</li>  
                      <li>Limpeza Técnica de Obras</li> 
                      <li>Organização de Eventos</li> 
                      <li>Mão de Obra para Eventos</li> 
                      <li>Bombeiro Civil</li> 
                    </ul>

              </div>
              &nbsp;
            </div>


            <div class="grupo1">

              <div style="float: left; width: 25%;">
                    <div class="titulo1a">SERVIÇOS PRIME PARA CONDOMÍNIOS</div>
              </div>

              <div style="float: left; width: 75%;">
                Sejam eles horizontais ou verticais, de pequeno, médio ou grande porte, nossa empresa possui expertise e conhecimento das demandas específicas deste segmento. Por isso, conta com uma divisão exclusiva para oferecer novos recursos, tecnologias e estratégias. 
                <p>
                Oferecemos:
                <ul>
                  <li>Portaria</li> 
                  <li>Zeladoria</li> 
                  <li>Concierge e Recepção</li> 
                  <li>Manutenção Predial</li> 
                  <li>Paisagismo e Jardinagem</li> 
                  <li>Copa e Cozinha</li> 
                  <li>Limpeza</li> 
                  <li>Bombeiro Civil</li> 
                  <li>CFTV</li> 
                </ul>


              </div>
              &nbsp;
            </div>


            <div class="" style="margin-bottom: 50px;">

              <div style="float: left; width: 25%;">
                    <div class="titulo1a">BENEFÍCIO EXCLUSIVO</div>
              </div>

              <div style="float: left; width: 75%;">
                Oferecemos aos nossos clientes Condomínios um benefício exclusivo, a Assistência 24h para pequenos reparos. O Condomínio conta com apoio 24hs para pequenas emergências do dia a dia, como elétrica e hidráulica básicas, desentupimento, chaveiro, entre outros.
              </div>
              &nbsp;
            </div>

  				</div>
  			</article>
      <?php endwhile;
      endif; ?>
      <?php if (comments_open()){
        //comments_template( '', true );
      } ?>
		</div>  
	</main>
	<!-- /content  -->
		
	<?php get_footer(); ?>