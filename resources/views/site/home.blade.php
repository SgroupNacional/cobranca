<!DOCTYPE html>
<html lang="pt-br">
	<!--begin::Head-->
	<head>
		<title>Metronic - The World's #1 Selling Tailwind CSS & Bootstrap Admin Template by KeenThemes</title>
		<meta charset="utf-8" />
		<meta name="description" content="The most advanced Tailwind CSS & Bootstrap 5 Admin Theme with 40 unique prebuilt layouts on Themeforest trusted by 100,000 beginners and professionals. Multi-demo, Dark Mode, RTL support and complete React, Angular, Vue, Asp.Net Core, Rails, Spring, Blazor, Django, Express.js, Node.js, Flask, Symfony & Laravel versions. Grab your copy now and get life-time updates for free." />
		<meta name="keywords" content="tailwind, tailwindcss, metronic, bootstrap, bootstrap 5, angular, VueJs, React, Asp.Net Core, Rails, Spring, Blazor, Django, Express.js, Node.js, Flask, Symfony & Laravel starter kits, admin themes, web design, figma, web development, free templates, free admin themes, bootstrap theme, bootstrap template, bootstrap dashboard, bootstrap dak mode, bootstrap button, bootstrap datepicker, bootstrap timepicker, fullcalendar, datatables, flaticon" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta property="og:locale" content="en_US" />
		<meta property="og:type" content="article" />
		<meta property="og:title" content="Metronic - The World's #1 Selling Tailwind CSS & Bootstrap Admin Template by KeenThemes" />
		<meta property="og:url" content="https://keenthemes.com/metronic" />
		<meta property="og:site_name" content="Metronic by Keenthemes" />
		<link rel="canonical" href="http://preview.keenthemes.comlanding.html" />
		<link rel="shortcut icon" href="assets/media/logos/favicon.ico" />
		<!--begin::Fonts(mandatory for all pages)-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
		<!--end::Fonts-->
		<!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
		<link href="assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
		<link href="assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
		<!--end::Global Stylesheets Bundle-->
		<script>// Frame-busting to prevent site from being loaded within a frame without permission (click-jacking) if (window.top != window.self) { window.top.location.replace(window.self.location.href); }</script>
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" data-bs-spy="scroll" data-bs-target="#kt_landing_menu" class="bg-body position-relative app-blank">
		<!--begin::Theme mode setup on page load-->
		<script>var defaultThemeMode = "light"; var themeMode; if ( document.documentElement ) { if ( document.documentElement.hasAttribute("data-bs-theme-mode")) { themeMode = document.documentElement.getAttribute("data-bs-theme-mode"); } else { if ( localStorage.getItem("data-bs-theme") !== null ) { themeMode = localStorage.getItem("data-bs-theme"); } else { themeMode = defaultThemeMode; } } if (themeMode === "system") { themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light"; } document.documentElement.setAttribute("data-bs-theme", themeMode); }</script>
		<!--end::Theme mode setup on page load-->
		<!--begin::Root-->
		<div class="d-flex flex-column flex-root" id="kt_app_root">
			<!--begin::Header Section-->
			<div class="mb-0" id="home">
				<!--begin::Wrapper-->
				<div class="bgi-no-repeat bgi-size-contain bgi-position-x-center bgi-position-y-bottom landing-dark-bg" style="background-image: url(assets/media/svg/illustrations/landing.svg)">
					<!--begin::Header-->
					<div class="landing-header" data-kt-sticky="true" data-kt-sticky-name="landing-header" data-kt-sticky-offset="{default: '200px', lg: '300px'}">
						<!--begin::Container-->
						<div class="container">
							<!--begin::Wrapper-->
							<div class="d-flex align-items-center justify-content-between">
								<!--begin::Logo-->
								<div class="d-flex align-items-center flex-equal">
									<!--begin::Mobile menu toggle-->
									<button class="btn btn-icon btn-active-color-primary me-3 d-flex d-lg-none" id="kt_landing_menu_toggle">
										<i class="ki-outline ki-abstract-14 fs-2hx"></i>
									</button>
									<!--end::Mobile menu toggle-->
									<!--begin::Logo image-->
									<a href="landing.html">
										<img alt="Logo" src="assets/media/logos/landing.png" class="logo-default" width="100" height="50" />
									</a>
									<!--end::Logo image-->
								</div>
								<!--end::Logo-->
								<!--begin::Menu wrapper-->
								<div class="d-lg-block" id="kt_header_nav_wrapper">
									<div class="d-lg-block p-5 p-lg-0" data-kt-drawer="true" data-kt-drawer-name="landing-menu" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="200px" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_landing_menu_toggle" data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_body', lg: '#kt_header_nav_wrapper'}">
										<!--begin::Menu-->
										<div class="menu menu-column flex-nowrap menu-rounded menu-lg-row menu-title-gray-600 menu-state-title-primary nav nav-flush fs-5 fw-semibold" id="kt_landing_menu">
											<!--begin::Menu item-->
											<div class="menu-item">
												<!--begin::Menu link-->
												<a class="menu-link nav-link active py-3 px-4 px-xxl-6" href="#kt_body" data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true">Início</a>
												<!--end::Menu link-->
											</div>
											<!--end::Menu item-->
											<!--begin::Menu item-->
											<div class="menu-item">
												<!--begin::Menu link-->
												<a class="menu-link nav-link py-3 px-4 px-xxl-6" href="#how-it-works" data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true">Como Funciona</a>
												<!--end::Menu link-->
											</div>
											<!--end::Menu item-->
											<!--begin::Menu item-->
											<div class="menu-item">
												<!--begin::Menu link-->
												<a class="menu-link nav-link py-3 px-4 px-xxl-6" href="#achievements" data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true">Resultados</a>
												<!--end::Menu link-->
											</div>
											<!--end::Menu item-->
											<!--begin::Menu item-->
											<div class="menu-item">
												<!--begin::Menu link-->
												<a class="menu-link nav-link py-3 px-4 px-xxl-6" href="#team" data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true">Sobre Nós</a>
												<!--end::Menu link-->
											</div>
											<!--end::Menu item-->
											<!--begin::Menu item-->
											<div class="menu-item">
												<!--begin::Menu link-->
												<a class="menu-link nav-link py-3 px-4 px-xxl-6" href="#portfolio" data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true">Funcionalidades</a>
												<!--end::Menu link-->
											</div>
											<!--end::Menu item-->
											<!--begin::Menu item-->
											<div class="menu-item">
												<!--begin::Menu link-->
												<a class="menu-link nav-link py-3 px-4 px-xxl-6" href="#pricing" data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true">Planos</a>
												<!--end::Menu link-->
											</div>
											<!--end::Menu item-->
										</div>
										<!--end::Menu-->
									</div>
								</div>
								<!--end::Menu wrapper-->
								<!--begin::Toolbar-->
								<div class="flex-equal text-end ms-1">
									<a href="/login" class="btn btn-success">Acessar conta</a>
								</div>
								<!--end::Toolbar-->
							</div>
							<!--end::Wrapper-->
						</div>
						<!--end::Container-->
					</div>
					<!--end::Header-->
					<!--begin::Landing hero-->
					<div class="d-flex flex-column flex-center w-100 min-h-350px min-h-lg-500px px-9">
						<!--begin::Heading-->
						<div class="text-center mb-5 mb-lg-10 py-10 py-lg-20">
							<!--begin::Title-->
							<h1 class="text-white lh-base fw-bold fs-2x fs-lg-3x mb-15">Sua régua de cobrança
							<br />automática,
							<span style="background: linear-gradient(to right, #0728e4ff 0%, #dbb701ff 100%);-webkit-background-clip: text;-webkit-text-fill-color: transparent;">
								<span id="kt_landing_hero_text">simples e eficaz.</span>
							</span></h1>
							<!--end::Title-->
							<!--begin::Action-->
							<a href="/site#pricing" class="btn btn-primary">Ver Planos</a>
							<!--end::Action-->
						</div>
						<!--end::Heading-->
						<!--begin::Clients-->
						<div class="d-flex flex-center flex-wrap position-relative px-5">
							<!--begin::Client-->
							<div class="d-flex flex-center m-3 m-md-6" data-bs-toggle="tooltip" title="rastrosystem">
								<img src="assets/media/svg/brand-logos/rastro.png" class="mh-30px mh-lg-40px" alt="logo da rastrosystem" />
							</div>
							<!--end::Client-->
							<!--begin::Client-->
							<div class="d-flex flex-center m-3 m-md-6" data-bs-toggle="tooltip" title="sgroupnacional">
								<img src="assets/media/svg/brand-logos/sgroup.png" class="mh-30px mh-lg-60px" alt="logo da sgroup" />
							</div>
							<!--end::Client-->
						</div>
						<!--end::Clients-->
					</div>
					<!--end::Landing hero-->
				</div>
				<!--end::Wrapper-->
				<!--begin::Curve bottom-->
				<div class="landing-curve landing-dark-color mb-10 mb-lg-20">
					<svg viewBox="15 12 1470 48" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M0 11C3.93573 11.3356 7.85984 11.6689 11.7725 12H1488.16C1492.1 11.6689 1496.04 11.3356 1500 11V12H1488.16C913.668 60.3476 586.282 60.6117 11.7725 12H0V11Z" fill="currentColor"></path>
					</svg>
				</div>
				<!--end::Curve bottom-->
			</div>
			<!--end::Header Section-->
			<!--begin::How It Works Section-->
			<div class="mb-n10 mb-lg-n20 z-index-2">
				<!--begin::Container-->
				<div class="container">
					<!--begin::Heading-->
					<div class="text-center mb-17">
						<!--begin::Title-->
						<h3 class="fs-2hx text-gray-900 mb-5" id="how-it-works" data-kt-scroll-offset="{default: 100, lg: 150}">Em Poucos Passos</h3>
						<!--end::Title-->
						<!--begin::Text-->
						<div class="fs-5 text-muted fw-bold">Automatize boletos, acompanhe pagamentos 
						<br />e reduza a inadimplência em poucos cliques.</div>
						<!--end::Text-->
					</div>
					<!--end::Heading-->
					<!--begin::Row-->
					<div class="row w-100 gy-10 mb-md-20">
						<!--begin::Col-->
						<div class="col-md-4 px-5">
							<!--begin::Story-->
							<div class="text-center mb-10 mb-md-0">
								<!--begin::Illustration-->
								<img src="assets/media/illustrations/sketchy-1/2.png" class="mh-125px mb-9" alt="" />
								<!--end::Illustration-->
								<!--begin::Heading-->
								<div class="d-flex flex-center mb-5">
									<!--begin::Badge-->
									<span class="badge badge-circle badge-light-success fw-bold p-5 me-3 fs-3">1</span>
									<!--end::Badge-->
									<!--begin::Title-->
									<div class="fs-5 fs-lg-3 fw-bold text-gray-900">Gere seus boletos</div>
									<!--end::Title-->
								</div>
								<!--end::Heading-->
								<!--begin::Description-->
								<div class="fw-semibold fs-6 fs-lg-4 text-muted">Crie cobranças em segundos,  
								<br />com vencimento e juros. <br /></div>
								<!--end::Description-->
							</div>
							<!--end::Story-->
						</div>
						<!--end::Col-->
						<!--begin::Col-->
						<div class="col-md-4 px-5">
							<!--begin::Story-->
							<div class="text-center mb-10 mb-md-0">
								<!--begin::Illustration-->
								<img src="assets/media/illustrations/sketchy-1/8.png" class="mh-125px mb-9" alt="" />
								<!--end::Illustration-->
								<!--begin::Heading-->
								<div class="d-flex flex-center mb-5">
									<!--begin::Badge-->
									<span class="badge badge-circle badge-light-success fw-bold p-5 me-3 fs-3">2</span>
									<!--end::Badge-->
									<!--begin::Title-->
									<div class="fs-5 fs-lg-3 fw-bold text-gray-900">Envio automático</div>
									<!--end::Title-->
								</div>
								<!--end::Heading-->
								<!--begin::Description-->
								<div class="fw-semibold fs-6 fs-lg-4 text-muted">Agende ou envie por e-mail, WhatsApp ou link.</div>
								<!--end::Description-->
							</div>
							<!--end::Story-->
						</div>
						<!--end::Col-->
						<!--begin::Col-->
						<div class="col-md-4 px-5">
							<!--begin::Story-->
							<div class="text-center mb-10 mb-md-0">
								<!--begin::Illustration-->
								<img src="assets/media/illustrations/sketchy-1/12.png" class="mh-125px mb-9" alt="" />
								<!--end::Illustration-->
								<!--begin::Heading-->
								<div class="d-flex flex-center mb-5">
									<!--begin::Badge-->
									<span class="badge badge-circle badge-light-success fw-bold p-5 me-3 fs-3">3</span>
									<!--end::Badge-->
									<!--begin::Title-->
									<div class="fs-5 fs-lg-3 fw-bold text-gray-900">Acompanhe os recebimentos</div>
									<!--end::Title-->
								</div>
								<!--end::Heading-->
								<!--begin::Description-->
								<div class="fw-semibold fs-6 fs-lg-4 text-muted">Receba notificações e acompanhe o status em tempo real.</div>
								<!--end::Description-->
							</div>
							<!--end::Story-->
						</div>
						<!--end::Col-->
					</div>
					<!--end::Row-->
					<!--begin::Product slider-->
					<div class="tns tns-default">
						<!--begin::Slider-->
						<div data-tns="true" data-tns-loop="true" data-tns-swipe-angle="false" data-tns-speed="2000" data-tns-autoplay="true" data-tns-autoplay-timeout="18000" data-tns-controls="true" data-tns-nav="false" data-tns-items="1" data-tns-center="false" data-tns-dots="false" data-tns-prev-button="#kt_team_slider_prev1" data-tns-next-button="#kt_team_slider_next1">
							<!--begin::Item-->
							<div class="text-center px-5 pt-5 pt-lg-10 px-lg-10">
								<img src="assets/media/preview/demos/demo1/light-ltr.png" class="card-rounded shadow mh-lg-650px mw-100" alt="" />
							</div>
							<!--end::Item-->
							<!--begin::Item-->
							<div class="text-center px-5 pt-5 pt-lg-10 px-lg-10">
								<img src="assets/media/preview/demos/demo2/light-ltr.png" class="card-rounded shadow mh-lg-650px mw-100" alt="" />
							</div>
							<!--end::Item-->
							<!--begin::Item-->
							<div class="text-center px-5 pt-5 pt-lg-10 px-lg-10">
								<img src="assets/media/preview/demos/demo4/light-ltr.png" class="card-rounded shadow mh-lg-650px mw-100" alt="" />
							</div>
							<!--end::Item-->
							<!--begin::Item-->
							<div class="text-center px-5 pt-5 pt-lg-10 px-lg-10">
								<img src="assets/media/preview/demos/demo5/light-ltr.png" class="card-rounded shadow mh-lg-650px mw-100" alt="" />
							</div>
							<!--end::Item-->
						</div>
						<!--end::Slider-->
					</div>
					<!--end::Product slider-->
				</div>
				<!--end::Container-->
			</div>
			<!--end::How It Works Section-->
			<!--begin::Statistics Section-->
			<div class="mt-sm-n10">
				<!--begin::Curve top-->
				<div class="landing-curve landing-dark-color">
					<svg viewBox="15 -1 1470 48" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M1 48C4.93573 47.6644 8.85984 47.3311 12.7725 47H1489.16C1493.1 47.3311 1497.04 47.6644 1501 48V47H1489.16C914.668 -1.34764 587.282 -1.61174 12.7725 47H1V48Z" fill="currentColor"></path>
					</svg>
				</div>
				<!--end::Curve top-->
				<!--begin::Wrapper-->
				<div class="pb-15 pt-18 landing-dark-bg">
					<!--begin::Container-->
					<div class="container">
						<!--begin::Heading-->
						<div class="text-center mt-15 mb-18" id="achievements" data-kt-scroll-offset="{default: 100, lg: 150}">
							<!--begin::Title-->
							<h3 class="fs-2hx text-white fw-bold mb-5">Cobrança Inteligente</h3>
							<!--end::Title-->
							<!--begin::Description-->
							<div class="fs-3 text-gray-700 fw-bold">Economize tempo, reduza inadimplência e 
							<br />acompanhe tudo em tempo real.</div>
							<!--end::Description-->
						</div>
						<!--end::Heading-->
						<!--begin::Statistics-->
						<div class="d-flex flex-center">
							<!--begin::Items-->
							<div class="d-flex flex-wrap flex-center justify-content-lg-between mb-15 mx-auto w-xl-900px">
								<!--begin::Item-->
								<div class="d-flex flex-column flex-center h-200px w-200px h-lg-250px w-lg-250px m-3 bgi-no-repeat bgi-position-center bgi-size-contain" style="background-image: url('assets/media/svg/misc/octagon.svg')">
									<!--begin::Symbol-->
									<i class="ki-outline ki-element-11 fs-2tx text-white mb-3"></i>
									<!--end::Symbol-->
									<!--begin::Info-->
									<div class="mb-0">
										<!--begin::Value-->
										<div class="fs-lg-2hx fs-2x fw-bold text-white d-flex flex-center">
											<div class="min-w-70px" data-kt-countup="true" data-kt-countup-value="700" data-kt-countup-suffix="+">0</div>
										</div>
										<!--end::Value-->
										<!--begin::Label-->
										<span class="text-gray-600 fw-semibold fs-5 lh-0">Empresas Atendidas</span>
										<!--end::Label-->
									</div>
									<!--end::Info-->
								</div>
								<!--end::Item-->
								<!--begin::Item-->
								<div class="d-flex flex-column flex-center h-200px w-200px h-lg-250px w-lg-250px m-3 bgi-no-repeat bgi-position-center bgi-size-contain" style="background-image: url('assets/media/svg/misc/octagon.svg')">
									<!--begin::Symbol-->
									<i class="ki-outline ki-chart-pie-4 fs-2tx text-white mb-3"></i>
									<!--end::Symbol-->
									<!--begin::Info-->
									<div class="mb-0">
										<!--begin::Value-->
										<div class="fs-lg-2hx fs-2x fw-bold text-white d-flex flex-center">
											<div class="min-w-70px" data-kt-countup="true" data-kt-countup-value="80" data-kt-countup-suffix="K+">0</div>
										</div>
										<!--end::Value-->
										<!--begin::Label-->
										<span class="text-gray-600 fw-semibold fs-5 lh-0">Boletos Emitidos</span>
										<!--end::Label-->
									</div>
									<!--end::Info-->
								</div>
								<!--end::Item-->
								<!--begin::Item-->
								<div class="d-flex flex-column flex-center h-200px w-200px h-lg-250px w-lg-250px m-3 bgi-no-repeat bgi-position-center bgi-size-contain" style="background-image: url('assets/media/svg/misc/octagon.svg')">
									<!--begin::Symbol-->
									<i class="ki-outline ki-basket fs-2tx text-white mb-3"></i>
									<!--end::Symbol-->
									<!--begin::Info-->
									<div class="mb-0">
										<!--begin::Value-->
										<div class="fs-lg-2hx fs-2x fw-bold text-white d-flex flex-center">
											<div class="min-w-70px" data-kt-countup="true" data-kt-countup-value="35" data-kt-countup-suffix="M+">0</div>
										</div>
										<!--end::Value-->
										<!--begin::Label-->
										<span class="text-gray-600 fw-semibold fs-5 lh-0">Redução de Inadimplência</span>
										<!--end::Label-->
									</div>
									<!--end::Info-->
								</div>
								<!--end::Item-->
							</div>
							<!--end::Items-->
						</div>
						<!--end::Statistics-->
						<!--begin::Testimonial-->
						<div class="fs-2 fw-semibold text-muted text-center mb-3">
						<span class="fs-1 lh-1 text-gray-700">“</span>Quando você tem controle sobre suas cobranças, seu negócio respira com  
						<br />
						<span class="text-gray-700 me-1">mais tranquilidade</span>, e cresce com mais segurança.
						<span class="fs-1 lh-1 text-gray-700">“</span></div>
						<!--end::Testimonial-->
					</div>
					<!--end::Container-->
				</div>
				<!--end::Wrapper-->
				<!--begin::Curve bottom-->
				<div class="landing-curve landing-dark-color">
					<svg viewBox="15 12 1470 48" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M0 11C3.93573 11.3356 7.85984 11.6689 11.7725 12H1488.16C1492.1 11.6689 1496.04 11.3356 1500 11V12H1488.16C913.668 60.3476 586.282 60.6117 11.7725 12H0V11Z" fill="currentColor"></path>
					</svg>
				</div>
				<!--end::Curve bottom-->
			</div>
			<!--end::Statistics Section-->
			<!--begin::Team Section-->
			<div class="py-10 py-lg-20">
				<!--begin::Container-->
				<div class="container">
					<!--begin::Heading-->
					<div class="text-center mb-12">
						<!--begin::Title-->
						<h3 class="fs-2hx text-gray-900 mb-5" id="team" data-kt-scroll-offset="{default: 100, lg: 150}">Quem Está por Trás da Solução?</h3>
						<!--end::Title-->
						<!--begin::Sub-title-->
						<div class="fs-5 text-muted fw-bold">Com experiência real no mercado, nosso time entende as dores de quem precisa 
						<br />cobrar com eficiência e oferece soluções pensadas para gerar resultado.</div>
						<!--end::Sub-title=-->
					</div>
					<!--end::Heading-->
					<!--begin::Slider-->
					<div class="tns tns-default" style="direction: ltr">
						<!--begin::Wrapper-->
						<div data-tns="true" data-tns-loop="true" data-tns-swipe-angle="false" data-tns-speed="2000" data-tns-autoplay="true" data-tns-autoplay-timeout="18000" data-tns-controls="true" data-tns-nav="false" data-tns-items="1" data-tns-center="false" data-tns-dots="false" data-tns-prev-button="#kt_team_slider_prev" data-tns-next-button="#kt_team_slider_next" data-tns-responsive="{1200: {items: 3}, 992: {items: 2}}">
							<!--begin::Item-->
							<div class="text-center">
								<!--begin::Photo-->
								<div class="octagon mx-auto mb-5 d-flex w-200px h-200px bgi-no-repeat bgi-size-contain bgi-position-center" style="background-image:url('assets/media/avatars/300-1.jpg')"></div>
								<!--end::Photo-->
								<!--begin::Person-->
								<div class="mb-0">
									<!--begin::Name-->
									<a href="#" class="text-gray-900 fw-bold text-hover-primary fs-3">Paul Miles</a>
									<!--end::Name-->
									<!--begin::Position-->
									<div class="text-muted fs-6 fw-semibold mt-1">Development Lead</div>
									<!--begin::Position-->
								</div>
								<!--end::Person-->
							</div>
							<!--end::Item-->
							<!--begin::Item-->
							<div class="text-center">
								<!--begin::Photo-->
								<div class="octagon mx-auto mb-5 d-flex w-200px h-200px bgi-no-repeat bgi-size-contain bgi-position-center" style="background-image:url('assets/media/avatars/300-2.jpg')"></div>
								<!--end::Photo-->
								<!--begin::Person-->
								<div class="mb-0">
									<!--begin::Name-->
									<a href="#" class="text-gray-900 fw-bold text-hover-primary fs-3">Melisa Marcus</a>
									<!--end::Name-->
									<!--begin::Position-->
									<div class="text-muted fs-6 fw-semibold mt-1">Creative Director</div>
									<!--begin::Position-->
								</div>
								<!--end::Person-->
							</div>
							<!--end::Item-->
							<!--begin::Item-->
							<div class="text-center">
								<!--begin::Photo-->
								<div class="octagon mx-auto mb-5 d-flex w-200px h-200px bgi-no-repeat bgi-size-contain bgi-position-center" style="background-image:url('assets/media/avatars/300-5.jpg')"></div>
								<!--end::Photo-->
								<!--begin::Person-->
								<div class="mb-0">
									<!--begin::Name-->
									<a href="#" class="text-gray-900 fw-bold text-hover-primary fs-3">David Nilson</a>
									<!--end::Name-->
									<!--begin::Position-->
									<div class="text-muted fs-6 fw-semibold mt-1">Python Expert</div>
									<!--begin::Position-->
								</div>
								<!--end::Person-->
							</div>
							<!--end::Item-->
							<!--begin::Item-->
							<div class="text-center">
								<!--begin::Photo-->
								<div class="octagon mx-auto mb-5 d-flex w-200px h-200px bgi-no-repeat bgi-size-contain bgi-position-center" style="background-image:url('assets/media/avatars/300-20.jpg')"></div>
								<!--end::Photo-->
								<!--begin::Person-->
								<div class="mb-0">
									<!--begin::Name-->
									<a href="#" class="text-gray-900 fw-bold text-hover-primary fs-3">Anne Clarc</a>
									<!--end::Name-->
									<!--begin::Position-->
									<div class="text-muted fs-6 fw-semibold mt-1">Project Manager</div>
									<!--begin::Position-->
								</div>
								<!--end::Person-->
							</div>
							<!--end::Item-->
							<!--begin::Item-->
							<div class="text-center">
								<!--begin::Photo-->
								<div class="octagon mx-auto mb-5 d-flex w-200px h-200px bgi-no-repeat bgi-size-contain bgi-position-center" style="background-image:url('assets/media/avatars/300-23.jpg')"></div>
								<!--end::Photo-->
								<!--begin::Person-->
								<div class="mb-0">
									<!--begin::Name-->
									<a href="#" class="text-gray-900 fw-bold text-hover-primary fs-3">Ricky Hunt</a>
									<!--end::Name-->
									<!--begin::Position-->
									<div class="text-muted fs-6 fw-semibold mt-1">Art Director</div>
									<!--begin::Position-->
								</div>
								<!--end::Person-->
							</div>
							<!--end::Item-->
							<!--begin::Item-->
							<div class="text-center">
								<!--begin::Photo-->
								<div class="octagon mx-auto mb-5 d-flex w-200px h-200px bgi-no-repeat bgi-size-contain bgi-position-center" style="background-image:url('assets/media/avatars/300-12.jpg')"></div>
								<!--end::Photo-->
								<!--begin::Person-->
								<div class="mb-0">
									<!--begin::Name-->
									<a href="#" class="text-gray-900 fw-bold text-hover-primary fs-3">Alice Wayde</a>
									<!--end::Name-->
									<!--begin::Position-->
									<div class="text-muted fs-6 fw-semibold mt-1">Marketing Manager</div>
									<!--begin::Position-->
								</div>
								<!--end::Person-->
							</div>
							<!--end::Item-->
							<!--begin::Item-->
							<div class="text-center">
								<!--begin::Photo-->
								<div class="octagon mx-auto mb-5 d-flex w-200px h-200px bgi-no-repeat bgi-size-contain bgi-position-center" style="background-image:url('assets/media/avatars/300-9.jpg')"></div>
								<!--end::Photo-->
								<!--begin::Person-->
								<div class="mb-0">
									<!--begin::Name-->
									<a href="#" class="text-gray-900 fw-bold text-hover-primary fs-3">Carles Puyol</a>
									<!--end::Name-->
									<!--begin::Position-->
									<div class="text-muted fs-6 fw-semibold mt-1">QA Managers</div>
									<!--begin::Position-->
								</div>
								<!--end::Person-->
							</div>
							<!--end::Item-->
						</div>
						<!--end::Wrapper-->
					</div>
					<!--end::Slider-->
				</div>
				<!--end::Container-->
			</div>
			<!--end::Team Section-->
			<!--begin::Projects Section-->
			<div class="mb-lg-n15 position-relative z-index-2">
				<!--begin::Container-->
				<div class="container">
					<!--begin::Card-->
					<div class="card" style="filter: drop-shadow(0px 0px 40px rgba(68, 81, 96, 0.08))">
						<!--begin::Card body-->
						<div class="card-body p-lg-20">
							<!--begin::Heading-->
							<div class="text-center mb-5 mb-lg-10">
								<!--begin::Title-->
								<h3 class="fs-2hx text-gray-900 mb-5" id="portfolio" data-kt-scroll-offset="{default: 100, lg: 250}">Projetos</h3>
								<!--end::Title-->
							</div>
							<!--end::Heading-->
							<!--begin::Tabs wrapper-->
							<div class="d-flex flex-center mb-5 mb-lg-15">
								<!--begin::Tabs-->
								<ul class="nav border-transparent flex-center fs-5 fw-bold">
									<li class="nav-item">
										<a class="nav-link text-gray-500 text-active-primary px-3 px-lg-6 active" href="#" data-bs-toggle="tab" data-bs-target="#kt_landing_projects_latest">Recentes</a>
									</li>
									<li class="nav-item">
										<a class="nav-link text-gray-500 text-active-primary px-3 px-lg-6" href="#" data-bs-toggle="tab" data-bs-target="#kt_landing_projects_web_design">Interface</a>
									</li>
									<li class="nav-item">
										<a class="nav-link text-gray-500 text-active-primary px-3 px-lg-6" href="#" data-bs-toggle="tab" data-bs-target="#kt_landing_projects_mobile_apps">Área do Cliente</a>
									</li>
									<li class="nav-item">
										<a class="nav-link text-gray-500 text-active-primary px-3 px-lg-6" href="#" data-bs-toggle="tab" data-bs-target="#kt_landing_projects_development">Painel Administrativo</a>
									</li>
								</ul>
								<!--end::Tabs-->
							</div>
							<!--end::Tabs wrapper-->
							<!--begin::Tabs content-->
							<div class="tab-content">
								<!--begin::Tab pane-->
								<div class="tab-pane fade show active" id="kt_landing_projects_latest">
									<!--begin::Row-->
									<div class="row g-10">
										<!--begin::Col-->
										<div class="col-lg-6">
											<!--begin::Item-->
											<a class="d-block card-rounded overlay h-lg-100" data-fslightbox="lightbox-projects" href="assets/media/stock/600x600/img-23.jpg">
												<!--begin::Image-->
												<div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-lg-100 min-h-250px" style="background-image:url('assets/media/stock/600x600/img-23.jpg')"></div>
												<!--end::Image-->
												<!--begin::Action-->
												<div class="overlay-layer card-rounded bg-dark bg-opacity-25">
													<i class="ki-outline ki-eye fs-3x text-white"></i>
												</div>
												<!--end::Action-->
											</a>
											<!--end::Item-->
										</div>
										<!--end::Col-->
										<!--begin::Col-->
										<div class="col-lg-6">
											<!--begin::Row-->
											<div class="row g-10 mb-10">
												<!--begin::Col-->
												<div class="col-lg-6">
													<!--begin::Item-->
													<a class="d-block card-rounded overlay" data-fslightbox="lightbox-projects" href="assets/media/stock/600x600/img-22.jpg">
														<!--begin::Image-->
														<div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-250px" style="background-image:url('assets/media/stock/600x600/img-22.jpg')"></div>
														<!--end::Image-->
														<!--begin::Action-->
														<div class="overlay-layer card-rounded bg-dark bg-opacity-25">
															<i class="ki-outline ki-eye fs-3x text-white"></i>
														</div>
														<!--end::Action-->
													</a>
													<!--end::Item-->
												</div>
												<!--end::Col-->
												<!--begin::Col-->
												<div class="col-lg-6">
													<!--begin::Item-->
													<a class="d-block card-rounded overlay" data-fslightbox="lightbox-projects" href="assets/media/stock/600x600/img-21.jpg">
														<!--begin::Image-->
														<div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-250px" style="background-image:url('assets/media/stock/600x600/img-21.jpg')"></div>
														<!--end::Image-->
														<!--begin::Action-->
														<div class="overlay-layer card-rounded bg-dark bg-opacity-25">
															<i class="ki-outline ki-eye fs-3x text-white"></i>
														</div>
														<!--end::Action-->
													</a>
													<!--end::Item-->
												</div>
												<!--end::Col-->
											</div>
											<!--end::Row-->
											<!--begin::Item-->
											<a class="d-block card-rounded overlay" data-fslightbox="lightbox-projects" href="assets/media/stock/600x400/img-20.jpg">
												<!--begin::Image-->
												<div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-250px" style="background-image:url('assets/media/stock/600x600/img-20.jpg')"></div>
												<!--end::Image-->
												<!--begin::Action-->
												<div class="overlay-layer card-rounded bg-dark bg-opacity-25">
													<i class="ki-outline ki-eye fs-3x text-white"></i>
												</div>
												<!--end::Action-->
											</a>
											<!--end::Item-->
										</div>
										<!--end::Col-->
									</div>
									<!--end::Row-->
								</div>
								<!--end::Tab pane-->
								<!--begin::Tab pane-->
								<div class="tab-pane fade" id="kt_landing_projects_web_design">
									<!--begin::Row-->
									<div class="row g-10">
										<!--begin::Col-->
										<div class="col-lg-6">
											<!--begin::Item-->
											<a class="d-block card-rounded overlay h-lg-100" data-fslightbox="lightbox-projects" href="assets/media/stock/600x600/img-11.jpg">
												<!--begin::Image-->
												<div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-lg-100 min-h-250px" style="background-image:url('assets/media/stock/600x600/img-11.jpg')"></div>
												<!--end::Image-->
												<!--begin::Action-->
												<div class="overlay-layer card-rounded bg-dark bg-opacity-25">
													<i class="ki-outline ki-eye fs-3x text-white"></i>
												</div>
												<!--end::Action-->
											</a>
											<!--end::Item-->
										</div>
										<!--end::Col-->
										<!--begin::Col-->
										<div class="col-lg-6">
											<!--begin::Row-->
											<div class="row g-10 mb-10">
												<!--begin::Col-->
												<div class="col-lg-6">
													<!--begin::Item-->
													<a class="d-block card-rounded overlay" data-fslightbox="lightbox-projects" href="assets/media/stock/600x600/img-12.jpg">
														<!--begin::Image-->
														<div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-250px" style="background-image:url('assets/media/stock/600x600/img-12.jpg')"></div>
														<!--end::Image-->
														<!--begin::Action-->
														<div class="overlay-layer card-rounded bg-dark bg-opacity-25">
															<i class="ki-outline ki-eye fs-3x text-white"></i>
														</div>
														<!--end::Action-->
													</a>
													<!--end::Item-->
												</div>
												<!--end::Col-->
												<!--begin::Col-->
												<div class="col-lg-6">
													<!--begin::Item-->
													<a class="d-block card-rounded overlay" data-fslightbox="lightbox-projects" href="assets/media/stock/600x600/img-21.jpg">
														<!--begin::Image-->
														<div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-250px" style="background-image:url('assets/media/stock/600x600/img-21.jpg')"></div>
														<!--end::Image-->
														<!--begin::Action-->
														<div class="overlay-layer card-rounded bg-dark bg-opacity-25">
															<i class="ki-outline ki-eye fs-3x text-white"></i>
														</div>
														<!--end::Action-->
													</a>
													<!--end::Item-->
												</div>
												<!--end::Col-->
											</div>
											<!--end::Row-->
											<!--begin::Item-->
											<a class="d-block card-rounded overlay" data-fslightbox="lightbox-projects" href="assets/media/stock/600x400/img-20.jpg">
												<!--begin::Image-->
												<div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-250px" style="background-image:url('assets/media/stock/600x600/img-20.jpg')"></div>
												<!--end::Image-->
												<!--begin::Action-->
												<div class="overlay-layer card-rounded bg-dark bg-opacity-25">
													<i class="ki-outline ki-eye fs-3x text-white"></i>
												</div>
												<!--end::Action-->
											</a>
											<!--end::Item-->
										</div>
										<!--end::Col-->
									</div>
									<!--end::Row-->
								</div>
								<!--end::Tab pane-->
								<!--begin::Tab pane-->
								<div class="tab-pane fade" id="kt_landing_projects_mobile_apps">
									<!--begin::Row-->
									<div class="row g-10">
										<!--begin::Col-->
										<div class="col-lg-6">
											<!--begin::Row-->
											<div class="row g-10 mb-10">
												<!--begin::Col-->
												<div class="col-lg-6">
													<!--begin::Item-->
													<a class="d-block card-rounded overlay" data-fslightbox="lightbox-projects" href="assets/media/stock/600x600/img-16.jpg">
														<!--begin::Image-->
														<div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-250px" style="background-image:url('assets/media/stock/600x600/img-16.jpg')"></div>
														<!--end::Image-->
														<!--begin::Action-->
														<div class="overlay-layer card-rounded bg-dark bg-opacity-25">
															<i class="ki-outline ki-eye fs-3x text-white"></i>
														</div>
														<!--end::Action-->
													</a>
													<!--end::Item-->
												</div>
												<!--end::Col-->
												<!--begin::Col-->
												<div class="col-lg-6">
													<!--begin::Item-->
													<a class="d-block card-rounded overlay" data-fslightbox="lightbox-projects" href="assets/media/stock/600x600/img-12.jpg">
														<!--begin::Image-->
														<div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-250px" style="background-image:url('assets/media/stock/600x600/img-12.jpg')"></div>
														<!--end::Image-->
														<!--begin::Action-->
														<div class="overlay-layer card-rounded bg-dark bg-opacity-25">
															<i class="ki-outline ki-eye fs-3x text-white"></i>
														</div>
														<!--end::Action-->
													</a>
													<!--end::Item-->
												</div>
												<!--end::Col-->
											</div>
											<!--end::Row-->
											<!--begin::Item-->
											<a class="d-block card-rounded overlay" data-fslightbox="lightbox-projects" href="assets/media/stock/600x400/img-15.jpg">
												<!--begin::Image-->
												<div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-250px" style="background-image:url('assets/media/stock/600x600/img-15.jpg')"></div>
												<!--end::Image-->
												<!--begin::Action-->
												<div class="overlay-layer card-rounded bg-dark bg-opacity-25">
													<i class="ki-outline ki-eye fs-3x text-white"></i>
												</div>
												<!--end::Action-->
											</a>
											<!--end::Item-->
										</div>
										<!--end::Col-->
										<!--begin::Col-->
										<div class="col-lg-6">
											<!--begin::Item-->
											<a class="d-block card-rounded overlay h-lg-100" data-fslightbox="lightbox-projects" href="assets/media/stock/600x600/img-23.jpg">
												<!--begin::Image-->
												<div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-lg-100 min-h-250px" style="background-image:url('assets/media/stock/600x600/img-23.jpg')"></div>
												<!--end::Image-->
												<!--begin::Action-->
												<div class="overlay-layer card-rounded bg-dark bg-opacity-25">
													<i class="ki-outline ki-eye fs-3x text-white"></i>
												</div>
												<!--end::Action-->
											</a>
											<!--end::Item-->
										</div>
										<!--end::Col-->
									</div>
									<!--end::Row-->
								</div>
								<!--end::Tab pane-->
								<!--begin::Tab pane-->
								<div class="tab-pane fade" id="kt_landing_projects_development">
									<!--begin::Row-->
									<div class="row g-10">
										<!--begin::Col-->
										<div class="col-lg-6">
											<!--begin::Item-->
											<a class="d-block card-rounded overlay h-lg-100" data-fslightbox="lightbox-projects" href="assets/media/stock/600x600/img-15.jpg">
												<!--begin::Image-->
												<div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-lg-100 min-h-250px" style="background-image:url('assets/media/stock/600x600/img-15.jpg')"></div>
												<!--end::Image-->
												<!--begin::Action-->
												<div class="overlay-layer card-rounded bg-dark bg-opacity-25">
													<i class="ki-outline ki-eye fs-3x text-white"></i>
												</div>
												<!--end::Action-->
											</a>
											<!--end::Item-->
										</div>
										<!--end::Col-->
										<!--begin::Col-->
										<div class="col-lg-6">
											<!--begin::Row-->
											<div class="row g-10 mb-10">
												<!--begin::Col-->
												<div class="col-lg-6">
													<!--begin::Item-->
													<a class="d-block card-rounded overlay" data-fslightbox="lightbox-projects" href="assets/media/stock/600x600/img-22.jpg">
														<!--begin::Image-->
														<div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-250px" style="background-image:url('assets/media/stock/600x600/img-22.jpg')"></div>
														<!--end::Image-->
														<!--begin::Action-->
														<div class="overlay-layer card-rounded bg-dark bg-opacity-25">
															<i class="ki-outline ki-eye fs-3x text-white"></i>
														</div>
														<!--end::Action-->
													</a>
													<!--end::Item-->
												</div>
												<!--end::Col-->
												<!--begin::Col-->
												<div class="col-lg-6">
													<!--begin::Item-->
													<a class="d-block card-rounded overlay" data-fslightbox="lightbox-projects" href="assets/media/stock/600x600/img-21.jpg">
														<!--begin::Image-->
														<div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-250px" style="background-image:url('assets/media/stock/600x600/img-21.jpg')"></div>
														<!--end::Image-->
														<!--begin::Action-->
														<div class="overlay-layer card-rounded bg-dark bg-opacity-25">
															<i class="ki-outline ki-eye fs-3x text-white"></i>
														</div>
														<!--end::Action-->
													</a>
													<!--end::Item-->
												</div>
												<!--end::Col-->
											</div>
											<!--end::Row-->
											<!--begin::Item-->
											<a class="d-block card-rounded overlay" data-fslightbox="lightbox-projects" href="assets/media/stock/600x400/img-14.jpg">
												<!--begin::Image-->
												<div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-250px" style="background-image:url('assets/media/stock/600x600/img-14.jpg')"></div>
												<!--end::Image-->
												<!--begin::Action-->
												<div class="overlay-layer card-rounded bg-dark bg-opacity-25">
													<i class="ki-outline ki-eye fs-3x text-white"></i>
												</div>
												<!--end::Action-->
											</a>
											<!--end::Item-->
										</div>
										<!--end::Col-->
									</div>
									<!--end::Row-->
								</div>
								<!--end::Tab pane-->
							</div>
							<!--end::Tabs content-->
						</div>
						<!--end::Card body-->
					</div>
					<!--end::Card-->
				</div>
				<!--end::Container-->
			</div>
			<!--end::Projects Section-->
			<!--begin::Pricing Section-->
			<div class="mt-sm-n20">
				<!--begin::Curve top-->
				<div class="landing-curve landing-dark-color">
					<svg viewBox="15 -1 1470 48" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M1 48C4.93573 47.6644 8.85984 47.3311 12.7725 47H1489.16C1493.1 47.3311 1497.04 47.6644 1501 48V47H1489.16C914.668 -1.34764 587.282 -1.61174 12.7725 47H1V48Z" fill="currentColor"></path>
					</svg>
				</div>
				<!--end::Curve top-->
				<!--begin::Wrapper-->
				<div class="py-20 landing-dark-bg">
					<!--begin::Container-->
					<div class="container">
						<!--begin::Plans-->
						<div class="d-flex flex-column container pt-lg-20">
							<!--begin::Heading-->
							<div class="mb-13 text-center">
								<h1 class="fs-2hx fw-bold text-white mb-5" id="pricing" data-kt-scroll-offset="{default: 100, lg: 150}">Planos que cabem no seu bolso</h1>
								<div class="text-gray-600 fw-semibold fs-4">Escolha o plano ideal para sua empresa e simplifique suas  
								<br />cobranças com eficiência e segurança.</div>
							</div>
							<!--end::Heading-->
							<!--begin::Pricing-->
							<div class="text-center" id="kt_pricing">
								<!--begin::Nav group-->
								<div class="nav-group landing-dark-bg d-inline-flex mb-15" data-kt-buttons="true" style="border: 1px dashed #2B4666;">
									<a href="#" class="btn btn-color-gray-600 btn-active btn-active-success px-6 py-3 me-2 active" data-kt-plan="month">Mensal</a>
									<a href="#" class="btn btn-color-gray-600 btn-active btn-active-success px-6 py-3" data-kt-plan="annual">Anual</a>
								</div>
								<!--end::Nav group-->
								<!--begin::Row-->
								<div class="row g-10">
									<!--begin::Col-->
									<div class="col-xl-4">
										<div class="d-flex h-100 align-items-center">
											<!--begin::Option-->
											<div class="w-100 d-flex flex-column flex-center rounded-3 bg-body py-15 px-10">
												<!--begin::Heading-->
												<div class="mb-7 text-center">
													<!--begin::Title-->
													<h1 class="text-gray-900 mb-5 fw-boldest">Essencial</h1>
													<!--end::Title-->
													<!--begin::Description-->
													<div class="text-gray-500 fw-semibold mb-5">Ideal para começar</div>
													<!--end::Description-->
													<!--begin::Price-->
													<div class="text-center">
														<span class="mb-2 text-primary">R$</span>
														<span class="fs-3x fw-bold text-primary" data-kt-plan-price-month="49,90" data-kt-plan-price-annual="399,00">49,90</span>
														<span class="fs-7 fw-semibold opacity-50" data-kt-plan-price-month="/ Mês" data-kt-plan-price-annual="/ Ano">/ Mês</span>
													</div>
													<!--end::Price-->
												</div>
												<!--end::Heading-->
												<!--begin::Features-->
												<div class="w-100 mb-10">
													<!--begin::Item-->
													<div class="d-flex flex-stack mb-5">
														<span class="fw-semibold fs-6 text-gray-800 text-start pe-3">Até 10 usuários ativos</span>
														<i class="ki-outline ki-check-circle fs-1 text-success"></i>
													</div>
													<!--end::Item-->
													<!--begin::Item-->
													<div class="d-flex flex-stack mb-5">
														<span class="fw-semibold fs-6 text-gray-800 text-start pe-3">Até 30 integrações de projeto</span>
														<i class="ki-outline ki-check-circle fs-1 text-success"></i>
													</div>
													<!--end::Item-->
													<!--begin::Item-->
													<div class="d-flex flex-stack mb-5">
														<span class="fw-semibold fs-6 text-gray-800">Plataforma de análises avançadas</span>
														<i class="ki-outline ki-cross-circle fs-1 text-danger"></i>
													</div>
													<!--end::Item-->
													<!--begin::Item-->
													<div class="d-flex flex-stack mb-5">
														<span class="fw-semibold fs-6 text-gray-800">Gestão de prazos e arquivos</span>
														<i class="ki-outline ki-cross-circle fs-1 text-danger"></i>
													</div>
													<!--end::Item-->
													<!--begin::Item-->
													<div class="d-flex flex-stack">
														<span class="fw-semibold fs-6 text-gray-800">Projetos ilimitados</span>
														<i class="ki-outline ki-cross-circle fs-1 text-danger"></i>
													</div>
													<!--end::Item-->
												</div>
												<!--end::Features-->
												<!--begin::Select-->
												<a href="#" class="btn btn-primary">Escolher Plano</a>
												<!--end::Select-->
											</div>
											<!--end::Option-->
										</div>
									</div>
									<!--end::Col-->
									<!--begin::Col-->
									<div class="col-xl-4">
										<div class="d-flex h-100 align-items-center">
											<!--begin::Option-->
											<div class="w-100 d-flex flex-column flex-center rounded-3 bg-primary-subtle py-20 px-10 text-black">
												<!--begin::Heading-->
												<div class="mb-7 text-center">
													<!--begin::Title-->
													<h1 class=" mb-5 fw-boldest">Profissional</h1>
													<!--end::Title-->
													<!--begin::Description-->
													<div class=" opacity-75 fw-semibold mb-5">Para empresas em expansão</div>
													<!--end::Description-->
													<!--begin::Price-->
													<div class="text-center">
														<span class="mb-2 ">R$</span>
														<span class="fs-3x fw-bold text-primary" data-kt-plan-price-month="129,90" data-kt-plan-price-annual="849,00">129,90</span>
														<span class="fs-7 fw-semibold  opacity-75" data-kt-plan-price-month="/ Mês" data-kt-plan-price-annual="/ Ano">/ Mês</span>
													</div>
													<!--end::Price-->
												</div>
												<!--end::Heading-->
												<!--begin::Features-->
												<div class="w-100 mb-10">
													<!--begin::Item-->
													<div class="d-flex flex-stack mb-5">
														<span class="fw-semibold fs-6  opacity-75 text-start pe-3">Até 50 usuários ativos</span>
														<i class="ki-outline ki-check-circle fs-1 text-success"></i>
													</div>
													<!--end::Item-->
													<!--begin::Item-->
													<div class="d-flex flex-stack mb-5">
														<span class="fw-semibold fs-6  opacity-75 text-start pe-3">Até 100 integrações de projeto</span>
														<i class="ki-outline ki-check-circle fs-1 text-success"></i>
													</div>
													<!--end::Item-->
													<!--begin::Item-->
													<div class="d-flex flex-stack mb-5">
														<span class="fw-semibold fs-6  opacity-75 text-start pe-3">Plataforma de análises avançadas</span>
														<i class="ki-outline ki-check-circle fs-1 text-success"></i>
													</div>
													<!--end::Item-->
													<!--begin::Item-->
													<div class="d-flex flex-stack mb-5">
														<span class="fw-semibold fs-6  opacity-75 text-start pe-3">Gestão de prazos e arquivos</span>
														<i class="ki-outline ki-check-circle fs-1 text-success"></i>
													</div>
													<!--end::Item-->
													<!--begin::Item-->
													<div class="d-flex flex-stack">
														<span class="fw-semibold fs-6  opacity-75">Projetos ilimitados</span>
														<i class="ki-outline ki-cross-circle fs-1 text-danger"></i>
													</div>
													<!--end::Item-->
												</div>
												<!--end::Features-->
												<!--begin::Select-->
												<a href="#" class="btn btn-light">Escolher Plano</a>
												<!--end::Select-->
											</div>
											<!--end::Option-->
										</div>
									</div>
									<!--end::Col-->
									<!--begin::Col-->
									<div class="col-xl-4">
										<div class="d-flex h-100 align-items-center">
											<!--begin::Option-->
											<div class="w-100 d-flex flex-column flex-center rounded-3 bg-body py-15 px-10">
												<!--begin::Heading-->
												<div class="mb-7 text-center">
													<!--begin::Title-->
													<h1 class="text-gray-900 mb-5 fw-boldest">Corporativo</h1>
													<!--end::Title-->
													<!--begin::Description-->
													<div class="text-gray-500 fw-semibold mb-5">Para operações de grande porte</div>
													<!--end::Description-->
													<!--begin::Price-->
													<div class="text-center">
														<span class="mb-2 text-primary">R$</span>
														<span class="fs-3x fw-bold text-primary" data-kt-plan-price-month="299,90" data-kt-plan-price-annual="1.499,00">299,90</span>
														<span class="fs-7 fw-semibold opacity-50" data-kt-plan-price-month="/ Mês" data-kt-plan-price-annual="/ Ano">/ Mês</span>
													</div>
													<!--end::Price-->
												</div>
												<!--end::Heading-->
												<!--begin::Features-->
												<div class="w-100 mb-10">
													<!--begin::Item-->
													<div class="d-flex flex-stack mb-5">
														<span class="fw-semibold fs-6 text-gray-800 text-start pe-3">Usuários ilimitados</span>
														<i class="ki-outline ki-check-circle fs-1 text-success"></i>
													</div>
													<!--end::Item-->
													<!--begin::Item-->
													<div class="d-flex flex-stack mb-5">
														<span class="fw-semibold fs-6 text-gray-800 text-start pe-3">Integrações ilimitadas</span>
														<i class="ki-outline ki-check-circle fs-1 text-success"></i>
													</div>
													<!--end::Item-->
													<!--begin::Item-->
													<div class="d-flex flex-stack mb-5">
														<span class="fw-semibold fs-6 text-gray-800 text-start pe-3">Plataforma de análises avançadas</span>
														<i class="ki-outline ki-check-circle fs-1 text-success"></i>
													</div>
													<!--end::Item-->
													<!--begin::Item-->
													<div class="d-flex flex-stack mb-5">
														<span class="fw-semibold fs-6 text-gray-800 text-start pe-3">Gestão de prazos e arquivos</span>
														<i class="ki-outline ki-check-circle fs-1 text-success"></i>
													</div>
													<!--end::Item-->
													<!--begin::Item-->
													<div class="d-flex flex-stack">
														<span class="fw-semibold fs-6 text-gray-800 text-start pe-3">Projetos ilimitados</span>
														<i class="ki-outline ki-check-circle fs-1 text-success"></i>
													</div>
													<!--end::Item-->
												</div>
												<!--end::Features-->
												<!--begin::Select-->
												<a href="#" class="btn btn-primary">Escolher Plano</a>
												<!--end::Select-->
											</div>
											<!--end::Option-->
										</div>
									</div>
									<!--end::Col-->
								</div>
								<!--end::Row-->
							</div>
							<!--end::Pricing-->
						</div>
						<!--end::Plans-->
					</div>
					<!--end::Container-->
				</div>
				<!--end::Wrapper-->
				<!--begin::Curve bottom-->
				<div class="landing-curve landing-dark-color">
					<svg viewBox="15 12 1470 48" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M0 11C3.93573 11.3356 7.85984 11.6689 11.7725 12H1488.16C1492.1 11.6689 1496.04 11.3356 1500 11V12H1488.16C913.668 60.3476 586.282 60.6117 11.7725 12H0V11Z" fill="currentColor"></path>
					</svg>
				</div>
				<!--end::Curve bottom-->
			</div>
			<!--end::Pricing Section-->
			<!--begin::Testimonials Section-->
			<div class="mt-20 mb-n20 position-relative z-index-2">
				<!--begin::Container-->
				<div class="container">
					<!--begin::Heading-->
					<div class="text-center mb-17">
						<!--begin::Title-->
						<h3 class="fs-2hx text-gray-900 mb-5" id="clients" data-kt-scroll-offset="{default: 125, lg: 150}">O que dizem nossos clientes?</h3>
						<!--end::Title-->
						<!--begin::Description-->
						<div class="fs-5 text-muted fw-bold">Quem utiliza nossos serviços destaca a qualidade
						<br />praticidade e confiança que oferecemos. </div>
						<!--end::Description-->
					</div>
					<!--end::Heading-->
					<!--begin::Row-->
					<div class="row g-lg-10 mb-10 mb-lg-20">
						<!--begin::Col-->
						<div class="col-lg-4">
							<!--begin::Testimonial-->
							<div class="d-flex flex-column justify-content-between h-lg-100 px-10 px-lg-0 pe-lg-10 mb-15 mb-lg-0">
								<!--begin::Wrapper-->
								<div class="mb-7">
									<!--begin::Rating-->
									<div class="rating mb-6">
										<div class="rating-label me-2 checked">
											<i class="ki-outline ki-star fs-5"></i>
										</div>
										<div class="rating-label me-2 checked">
											<i class="ki-outline ki-star fs-5"></i>
										</div>
										<div class="rating-label me-2 checked">
											<i class="ki-outline ki-star fs-5"></i>
										</div>
										<div class="rating-label me-2 checked">
											<i class="ki-outline ki-star fs-5"></i>
										</div>
										<div class="rating-label me-2 checked">
											<i class="ki-outline ki-star fs-5"></i>
										</div>
									</div>
									<!--end::Rating-->
									<!--begin::Title-->
									<div class="fs-2 fw-bold text-gray-900 mb-3">Sistema rápido e fácil de usar</div>
									<!--end::Title-->
									<!--begin::Feedback-->
									<div class="text-gray-500 fw-semibold fs-4">Sem dúvida, o melhor sistema que já usei. A estrutura é clara, o design é limpo e a navegação é muito intuitiva. Facilitou meu trabalho do dia a dia.</div>
									<!--end::Feedback-->
								</div>
								<!--end::Wrapper-->
								<!--begin::Author-->
								<div class="d-flex align-items-center">
									<!--begin::Avatar-->
									<div class="symbol symbol-circle symbol-50px me-5">
										<img src="assets/media/avatars/300-1.jpg" class="" alt="" />
									</div>
									<!--end::Avatar-->
									<!--begin::Name-->
									<div class="flex-grow-1">
										<a href="#" class="text-gray-900 fw-bold text-hover-primary fs-6">João Almeida</a>
										<span class="text-muted d-block fw-bold">Desenvolvedor Full Stack</span>
									</div>
									<!--end::Name-->
								</div>
								<!--end::Author-->
							</div>
							<!--end::Testimonial-->
						</div>
						<!--end::Col-->
						<!--begin::Col-->
						<div class="col-lg-4">
							<!--begin::Testimonial-->
							<div class="d-flex flex-column justify-content-between h-lg-100 px-10 px-lg-0 pe-lg-10 mb-15 mb-lg-0">
								<!--begin::Wrapper-->
								<div class="mb-7">
									<!--begin::Rating-->
									<div class="rating mb-6">
										<div class="rating-label me-2 checked">
											<i class="ki-outline ki-star fs-5"></i>
										</div>
										<div class="rating-label me-2 checked">
											<i class="ki-outline ki-star fs-5"></i>
										</div>
										<div class="rating-label me-2 checked">
											<i class="ki-outline ki-star fs-5"></i>
										</div>
										<div class="rating-label me-2 checked">
											<i class="ki-outline ki-star fs-5"></i>
										</div>
										<div class="rating-label me-2 checked">
											<i class="ki-outline ki-star fs-5"></i>
										</div>
									</div>
									<!--end::Rating-->
									<!--begin::Title-->
									<div class="fs-2 fw-bold text-gray-900 mb-3">Ótimo suporte e confiabilidade</div>
									<!--end::Title-->
									<!--begin::Feedback-->
									<div class="text-gray-500 fw-semibold fs-4">Plataforma leve, rápida e confiável. A equipe está de parabéns. Tudo funciona perfeitamente e o suporte é excelente.</div>
									<!--end::Feedback-->
								</div>
								<!--end::Wrapper-->
								<!--begin::Author-->
								<div class="d-flex align-items-center">
									<!--begin::Avatar-->
									<div class="symbol symbol-circle symbol-50px me-5">
										<img src="assets/media/avatars/300-2.jpg" class="" alt="" />
									</div>
									<!--end::Avatar-->
									<!--begin::Name-->
									<div class="flex-grow-1">
										<a href="#" class="text-gray-900 fw-bold text-hover-primary fs-6">Carla Mendes</a>
										<span class="text-muted d-block fw-bold">Analista de Projetos</span>
									</div>
									<!--end::Name-->
								</div>
								<!--end::Author-->
							</div>
							<!--end::Testimonial-->
						</div>
						<!--end::Col-->
						<!--begin::Col-->
						<div class="col-lg-4">
							<!--begin::Testimonial-->
							<div class="d-flex flex-column justify-content-between h-lg-100 px-10 px-lg-0 pe-lg-10 mb-15 mb-lg-0">
								<!--begin::Wrapper-->
								<div class="mb-7">
									<!--begin::Rating-->
									<div class="rating mb-6">
										<div class="rating-label me-2 checked">
											<i class="ki-outline ki-star fs-5"></i>
										</div>
										<div class="rating-label me-2 checked">
											<i class="ki-outline ki-star fs-5"></i>
										</div>
										<div class="rating-label me-2 checked">
											<i class="ki-outline ki-star fs-5"></i>
										</div>
										<div class="rating-label me-2 checked">
											<i class="ki-outline ki-star fs-5"></i>
										</div>
										<div class="rating-label me-2 checked">
											<i class="ki-outline ki-star fs-5"></i>
										</div>
									</div>
									<!--end::Rating-->
									<!--begin::Title-->
									<div class="fs-2 fw-bold text-gray-900 mb-3">Plataforma intuitiva e moderna</div>
									<!--end::Title-->
									<!--begin::Feedback-->
									<div class="text-gray-500 fw-semibold fs-4">Melhor experiência com plataforma digital. Já testei vários serviços, mas esse foi o único que realmente superou minhas expectativas.</div>
									<!--end::Feedback-->
								</div>
								<!--end::Wrapper-->
								<!--begin::Author-->
								<div class="d-flex align-items-center">
									<!--begin::Avatar-->
									<div class="symbol symbol-circle symbol-50px me-5">
										<img src="assets/media/avatars/300-16.jpg" class="" alt="" />
									</div>
									<!--end::Avatar-->
									<!--begin::Name-->
									<div class="flex-grow-1">
										<a href="#" class="text-gray-900 fw-bold text-hover-primary fs-6">Eduardo Lima</a>
										<span class="text-muted d-block fw-bold">Gerente de TI</span>
									</div>
									<!--end::Name-->
								</div>
								<!--end::Author-->
							</div>
							<!--end::Testimonial-->
						</div>
						<!--end::Col-->
					</div>
					<!--end::Row-->
					<!--begin::Highlight-->
					<div class="d-flex flex-stack flex-wrap flex-md-nowrap card-rounded shadow p-8 p-lg-12 mb-n5 mb-lg-n13" style="background: linear-gradient(90deg, #20AA3E 0%, #03A588 100%);">
						<!--begin::Content-->
						<div class="my-2 me-5">
							<!--begin::Title-->
							<div class="fs-1 fs-lg-2qx fw-bold text-white mb-2">Comece agora com a automação de cobranças 
							<span class="fw-normal">e ganhe tempo!</span></div>
							<!--end::Title-->
							<!--begin::Description-->
							<div class="fs-6 fs-lg-5 text-white fw-semibold opacity-75">Junte-se aos mais de 10.000 clientes que já automatizam suas cobranças com eficiência.</div>
							<!--end::Description-->
						</div>
						<!--end::Content-->
						<!--begin::Link-->
						<a href="/login" class="btn btn-lg btn-outline border-2 btn-outline-white flex-shrink-0 my-2">Começar Agora</a>
						<!--end::Link-->
					</div>
					<!--end::Highlight-->
				</div>
				<!--end::Container-->
			</div>
			<!--end::Testimonials Section-->
			<!--begin::Footer Section-->
			<div class="mb-0">
				<!--begin::Curve top-->
				<div class="landing-curve landing-dark-color">
					<svg viewBox="15 -1 1470 48" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M1 48C4.93573 47.6644 8.85984 47.3311 12.7725 47H1489.16C1493.1 47.3311 1497.04 47.6644 1501 48V47H1489.16C914.668 -1.34764 587.282 -1.61174 12.7725 47H1V48Z" fill="currentColor"></path>
					</svg>
				</div>
				<!--end::Curve top-->
				<!--begin::Wrapper-->
				<div class="landing-dark-bg pt-20">
					<!--begin::Container-->
					<div class="container">
						<!--begin::Row-->
						<div class="row py-10 py-lg-20">
							<!--begin::Col-->
							<div class="col-lg-6 pe-lg-16 mb-10 mb-lg-0">
								<!--begin::Block-->
								<div class="rounded landing-dark-border p-9 mb-10">
									<!--begin::Title-->
									<h2 class="text-white">Precisa de uma Licença Personalizada?</h2>
									<!--end::Title-->
									<!--begin::Text-->
									<span class="fw-normal fs-4 text-gray-700">Envie um e-mail para:
									<a href="https://keenthemes.com/support" class="text-white opacity-50 text-hover-primary">suporte@sistemacobranca.com</a></span>
									<!--end::Text-->
								</div>
								<!--end::Block-->
								<!--begin::Block-->
								<div class="rounded landing-dark-border p-9">
									<!--begin::Title-->
									<h2 class="text-white">Quer um Projeto Sob Medida?</h2>
									<!--end::Title-->
									<!--begin::Text-->
									<span class="fw-normal fs-4 text-gray-700">Utilize nosso serviço de desenvolvimento personalizado. 
									<a href="pages/user-profile/overview.html" class="text-white opacity-50 text-hover-primary"> Clique aqui para solicitar um orçamento</a></span>
									<!--end::Text-->
								</div>
								<!--end::Block-->
							</div>
							<!--end::Col-->
							<!--begin::Col-->
							<div class="col-lg-6 ps-lg-16">
								<!--begin::Navs-->
								<div class="d-flex justify-content-center">
									<!--begin::Links-->
									<div class="d-flex fw-semibold flex-column me-20">
										<!--begin::Subtitle-->
										<h4 class="fw-bold text-gray-500 mb-6">Mais sobre o Sistema</h4>
										<!--end::Subtitle-->
										<!--begin::Link-->
										<a href="https://keenthemes.com/faqs" class="text-white opacity-50 text-hover-primary fs-5 mb-6">Central de Ajuda</a>
										<!--end::Link-->
										<!--begin::Link-->
										<a href="https://preview.keenthemes.com/html/metronic/docs" class="text-white opacity-50 text-hover-primary fs-5 mb-6">Documentação</a>
										<!--end::Link-->
										<!--begin::Link-->
										<a href="https://www.youtube.com/c/KeenThemesTuts/videos" class="text-white opacity-50 text-hover-primary fs-5 mb-6">Vídeos Tutoriais</a>
										<!--end::Link-->
										<!--begin::Link-->
										<a href="https://preview.keenthemes.com/html/metronic/docs/getting-started/changelog" class="text-white opacity-50 text-hover-primary fs-5 mb-6">Novidades</a>
										<!--end::Link-->
										<!--begin::Link-->
										<a href="https://devs.keenthemes.com/" class="text-white opacity-50 text-hover-primary fs-5 mb-6">Fórum de Suporte</a>
										<!--end::Link-->
										<!--begin::Link-->
										<a href="https://keenthemes.com/blog" class="text-white opacity-50 text-hover-primary fs-5">Blog</a>
										<!--end::Link-->
									</div>
									<!--end::Links-->
								</div>
								<!--end::Navs-->
							</div>
							<!--end::Col-->
						</div>
						<!--end::Row-->
					</div>
					<!--end::Container-->
					<!--begin::Separator-->
					<div class="landing-dark-separator"></div>
					<!--end::Separator-->
					<!--begin::Container-->
					<div class="container">
						<!--begin::Wrapper-->
						<div class="d-flex flex-column flex-md-row flex-stack py-7 py-lg-10">
							<!--begin::Copyright-->
							<div class="d-flex align-items-center order-2 order-md-1">
								<!--begin::Logo image-->
								<span class="mx-5 fs-6 fw-semibold text-gray-600 pt-1" href="https://keenthemes.com">&copy; 2025 Shield System</span>
								<!--end::Logo image-->
							</div>
							<!--end::Copyright-->
						</div>
						<!--end::Wrapper-->
					</div>
					<!--end::Container-->
				</div>
				<!--end::Wrapper-->
			</div>
			<!--end::Footer Section-->
			<!--begin::Scrolltop-->
			<div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
				<i class="ki-outline ki-arrow-up"></i>
			</div>
			<!--end::Scrolltop-->
		</div>
		<!--end::Root-->
		<!--begin::Scrolltop-->
		<div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
			<i class="ki-outline ki-arrow-up"></i>
		</div>
		<!--end::Scrolltop-->
		<!--begin::Javascript-->
		<script>var hostUrl = "assets/";</script>
		<!--begin::Global Javascript Bundle(mandatory for all pages)-->
		<script src="assets/plugins/global/plugins.bundle.js"></script>
		<script src="assets/js/scripts.bundle.js"></script>
		<!--end::Global Javascript Bundle-->
		<!--begin::Vendors Javascript(used for this page only)-->
		<script src="assets/plugins/custom/fslightbox/fslightbox.bundle.js"></script>
		<script src="assets/plugins/custom/typedjs/typedjs.bundle.js"></script>
		<!--end::Vendors Javascript-->
		<!--begin::Custom Javascript(used for this page only)-->
		<script src="assets/js/custom/landing.js"></script>
		<script src="assets/js/custom/pages/pricing/general.js"></script>
		<!--end::Custom Javascript-->
		<!--end::Javascript-->
	</body>
	<!--end::Body-->
</html>