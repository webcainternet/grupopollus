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
            <div style="background-image: url('/wp-content/uploads/2016/06/bg-seguranca2.jpg'); height: 200px; width: 100%; margin-top: -30px; background-size: cover; background-repeat: no-repeat; margin-bottom: 30px;" /></div>


            <div class="grupo1">

              <div style="float: left; width: 25%;">
                    <div class="titulo1a">SEGURANÇA PATRIMONIAL</div>
              </div>

              <div style="float: left; width: 75%;">

                Através da análise de riscos e diagnósticos do cliente, oferecemos uma gama completa de serviços e produtos da maior qualidade para planos de prevenção e ações táticas de segurança. Nossos profissionais seguem rigorosamente uma agenda periódica de treinamentos e reciclagem, garantindo uma equipe altamente preparada e atualizada.
                <p>
                Oferecemos:
                <ul>
                  <li>Vigilância</li>
                  <li>Ronda de Apoio Tático e Operacional</li>
                  <li>Ronda Informatizada</li>
                  <li>Vigilância e Proteção de Perímetros</li>
                  <li>Segurança de Eventos</li>
                </ul>
              </div>
              &nbsp;
            </div>


            <div class="grupo1">

              <div style="float: left; width: 25%;"><a name="pessoal"></a>
                    <div class="titulo1a">SEGURANÇA PESSOAL</div>
              </div>

              <div style="float: left; width: 75%;">

                Extremamente comprometidos com a integridade de nossos clientes, aliamos profissionais criteriosamente selecionados a tecnologia para dar toda a assistência e segurança a autoridades, executivos e celebridades.  Nossa equipe é frequentemente treinada em diversas especialidades, como direção defensiva, evasiva e proteção de patrimônio.
                <p>
                Oferecemos:
                <ul>
                  <li>Escolta e Patrulhamento</li>
                  <li>Planejamento de Itinerários de Pessoas</li>
                  <li>Assessoria a Expatriados</li>
                </ul>
              </div>
              &nbsp;
            </div>


            <div class="">

              <div style="float: left; width: 25%;"><a name="eletronica"></a>
                    <div class="titulo1a">SEGURANÇA ELETRÔNICA</div>
              </div>

              <div style="float: left; width: 75%;">
                Sempre atualizados com o que há de novo e com foco nas necessidades de cada cliente, planejamos e oferecemos toda a tecnologia necessária para garantir melhor segurança e qualidade de vida.
                <p>
                Oferecemos:
                <ul>
                  <li>CFTV</li>
                  <li>Alarmes e Sensores</li>
                  <li>Monitoramento 24h</li>
                  <li>Itinerário e Rastreamento de Cargas</li>
                </ul>
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
