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
            <div style="background-image: url('/wp-content/uploads/2016/06/bg-quemsomos2.jpg'); height: 200px; width: 100%; margin-top: -30px; background-size: cover; background-repeat: no-repeat; margin-bottom: 30px;" /></div>







            <?php the_content(); ?>

            <div class="grupo1">

              <div style="float: left; width: 25%;">
                    <div class="titulo1a">COMPROMISSO COM A QUALIDADE</div>
              </div>

              <div style="float: left; width: 75%;">

                No Grupo Pollus mantemos a Política de Qualidade Total em todos os nossos serviços. Nossas empresas possuem certificação ISO 9001 pela excelência no Sistema de Gestão da Qualidade. Nossas empresas de segurança também são certificadas pelo SESVESP, possuindo o CRS – Certificado de Regularidade em Segurança.
                <p>
                Nossa Política de Qualidade:
                <p><i>
                “Prestar serviços dentro de padrões de qualidade reconhecidos e aprimorados continuadamente, atendendo, plenamente, em condições competitivas, às expectativas dos clientes, por meio de colaboradores preparados e comprometidos.”</i>
              </div>
              &nbsp;
            </div>


            <div class="grupo1">

              <div style="float: left; width: 25%;">
                    <div class="titulo1a">SELEÇÃO E TREINAMENTO DE EQUIPE</div>
              </div>

              <div style="float: left; width: 75%;">
                  O Grupo Pollus entende que um conjunto de fatores determina o perfil do profissional a ser selecionado para determinadas atividades previamente alinhadas com cada cliente. Por isso, após a análise do serviço a ser executado, selecionamos o melhor perfil. Junto a isso criamos um plano de melhoria contínua, com treinamentos e acompanhamentos, buscando sempre a excelência em nosso atendimento.
                  <p>
                  Desde a sua fundação, o grupo trabalha de acordo com as regras e legislações específicas dos setores em que atua, com todos os registros, alvarás, autorizações e certificados que são necessários para atuar legalmente.
              </div>
              &nbsp;
            </div>


            <div class="">

              <div style="float: left; width: 25%;">
                    <div class="titulo1a">NOSSOS SERVIÇOS</div>
              </div>

              <div style="float: left; width: 75%;">
                A terceirização de serviços é uma das ferramentas mais utilizadas para simplificar e auxiliar o gerenciamento das empresas, elevando seus níveis de qualidade e reduzindo custos.
                <p>

                Identificando e compreendendo as particularidades de cada cliente, geramos as soluções mais eficientes e criativas.
                <p>

                Combinando tecnologia e desenvolvimento profissional, por meio de treinamentos especializados e buscas constantes pelo que há de mais moderno e novos métodos de trabalho, com o objetivo de elevar os padrões de qualidade e eficiência.
                <p>

                Conheça alguns de nossos serviços à sua disposição:
                <ul>
                  <li><strong>SEGURANÇA PATRIMONIAL</strong></li>
                  <li><strong>SEGURANÇA PESSOAL</strong></li>
                  <li><strong>SEGURANÇA ELETRÔNICA</strong></li>
                  <li><strong>SERVIÇOS CORPORATIVOS</strong></li>
                  <li><strong>SERVIÇOS ESPECIAIS PARA CONDOMÍNIOS</strong></li>
                </ul>
                <p>
                Alguns de nossos diferenciais:
                <p>

                <strong>APOIO 24H</strong>
                <p>

                Contamos com uma estrutura de apoio 24 horas para substituição ou reforço de pessoal e dispomos de uma equipe de retaguarda especializada no atendimento das mais diversas ocorrências.
                <p>

                <strong>CERTICADO DE QUALIDADE ISO 9001</strong>
                <p>

                Todos os processos são auditados pela certificação da ISO 9001, garantindo que a qualidade do processo será seguida rigorosamente visando atender os mais altos níveis de qualidade estipulados pelo Grupo Pollus.
                <p>


                <strong>EQUIPE DE IMPLANTAÇÃO</strong>
                <p>
                O Grupo Pollus possui uma equipe especifica de implantação de serviços que é responsável por acompanhar todas as implantações e definir juntamente com os clientes todos os processos que deverão ser seguidos junto a um plano de trabalho e posteriormente repassado aos colaboradores.
                <p>


                <strong>AUDITORIA</strong>
                <p>

                Possuímos uma equipe especializada de auditoria que acompanha os serviços executados em caráter pontual em nossos clientes para que possamos apontar a qualidade de nossos serviços e estar sempre atentos a mudanças e readequações com eficácia, visando a pró-atividade e o acompanhamento da evolução do negócio de nossos clientes.
                <p>

                <strong>SEGMENTOS DE ATUAÇÃO</strong>
                <p>

                Com expertise e atendimento personalizado, o Grupo Pollus atende há muitos anos alguns dos players mais importantes do mercado, nos mais diversos segmentos, tais como:
                <ul>
                  <li>Shoppings</li>
                  <li>Clubes</li>
                  <li>Condomínios residenciais e comerciais</li>
                  <li>Hospitais</li>
                  <li>Indústrias</li>
                  <li>Instituições Educacionais</li>
                  <li>Eventos</li>
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