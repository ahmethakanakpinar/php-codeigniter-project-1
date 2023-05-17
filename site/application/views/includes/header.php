<div class="header-container">
	<header class="header fixed dark clearfix">
		<div class="container">
			<div class="row">
				<div class="col-md-2">
					<!-- header-first start -->
					<!-- ================ -->
					<div class="header-first clearfix">

						<!-- header dropdown buttons -->
						<div class="header-dropdown-buttons visible-xs">
							<div class="btn-group dropdown">
								<button type="button" class="btn dropdown-toggle" data-toggle="dropdown"><i class="icon-search"></i></button>
								<ul class="dropdown-menu dropdown-menu-right dropdown-animation">
									<li>
										<form role="search" class="search-box margin-clear">
											<div class="form-group has-feedback">
												<input type="text" class="form-control" placeholder="Search">
												<i class="icon-search form-control-feedback"></i>
											</div>
										</form>
									</li>
								</ul>
							</div>
							<div class="btn-group dropdown">
								<button type="button" class="btn dropdown-toggle" data-toggle="dropdown"><i class="icon-basket-1"></i><span class="cart-count default-bg">8</span></button>
								<ul class="dropdown-menu dropdown-menu-right dropdown-animation cart">
									<li>
										<table class="table table-hover">
											<thead>
												<tr>
													<th class="quantity">QTY</th>
													<th class="product">Product</th>
													<th class="amount">Subtotal</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td class="quantity">2 x</td>
													<td class="product"><a href="shop-product.html">Android 4.4 Smartphone</a><span class="small">4.7" Dual Core 1GB</span></td>
													<td class="amount">$199.00</td>
												</tr>
												<tr>
													<td class="quantity">3 x</td>
													<td class="product"><a href="shop-product.html">Android 4.2 Tablet</a><span class="small">7.3" Quad Core 2GB</span></td>
													<td class="amount">$299.00</td>
												</tr>
												<tr>
													<td class="quantity">3 x</td>
													<td class="product"><a href="shop-product.html">Desktop PC</a><span class="small">Quad Core 3.2MHz, 8GB RAM, 1TB Hard Disk</span></td>
													<td class="amount">$1499.00</td>
												</tr>
												<tr>
													<td class="total-quantity" colspan="2">Total 8 Items</td>
													<td class="total-amount">$1997.00</td>
												</tr>
											</tbody>
										</table>
										<div class="panel-body text-right">
											<a href="shop-cart.html" class="btn btn-group btn-gray btn-sm">View Cart</a>
											<a href="shop-checkout.html" class="btn btn-group btn-gray btn-sm">Checkout</a>
										</div>
									</li>
								</ul>
							</div>
						</div>
						<!-- header dropdown buttons end-->

						<!-- logo -->
						<div id="logo" class="logo">
							<a href="<?php echo base_url() ?>"><img id="logo_img" src="<?php echo base_url("assets/images");?>/Logo_NIKE.svg.png" alt="The Project" style="margin:auto;height:55px;"></a>
						</div>

						<!-- name-and-slogan -->
						

					</div>
					<!-- header-first end -->

				</div>
				<div class="col-md-10">

					<!-- header-second start -->
					<!-- ================ -->
					<div class="header-second clearfix">

						<!-- main-navigation start -->
						<!-- classes: -->
						<!-- "onclick": Makes the dropdowns open on click, this the default bootstrap behavior e.g. class="main-navigation onclick" -->
						<!-- "animated": Enables animations on dropdowns opening e.g. class="main-navigation animated" -->
						<!-- "with-dropdown-buttons": Mandatory class that adds extra space, to the main navigation, for the search and cart dropdowns -->
						<!-- ================ -->
						<div class="main-navigation  animated with-dropdown-buttons">

							<!-- navbar start -->
							<!-- ================ -->
							<nav class="navbar navbar-default" role="navigation">
								<div class="container-fluid">

									<!-- Toggle get grouped for better mobile display -->
									<div class="navbar-header">
										<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-1">
											<span class="sr-only">Toggle navigation</span>
											<span class="icon-bar"></span>
											<span class="icon-bar"></span>
											<span class="icon-bar"></span>
										</button>

									</div>

									<!-- Collect the nav links, forms, and other content for toggling -->
									<div class="collapse navbar-collapse" id="navbar-collapse-1">
										<!-- main-menu -->
										<ul class="nav navbar-nav ">
											<li class="active">
												<a href="<?php echo base_url() ?>" >Anasayfa</a>
											</li>
											<li class="dropdown ">
												<a class="dropdown-toggle" data-toggle="dropdown" href="#">Hakkımızda</a>
												<ul class="dropdown-menu">
													<li><a href="features-dark-page.html">Hakkımızda</a></li>
													<li><a href="<?php echo base_url("portfolyo-listesi") ?>">Portfolyo</a></li>
													<li><a href="features-backgrounds.html">Haberler</a></li>
													<li><a href="features-grid.html">Referanslar</a></li>
												</ul>
											</li>
											<li class="dropdown ">
												<a class="dropdown-toggle" data-toggle="dropdown" href="#">Galeriler</a>
												<ul class="dropdown-menu">
													<li><a href="features-dark-page.html">Resim Galerileri</a></li>
													<li><a href="features-typography.html">Video Galerileri</a></li>
													<li><a href="features-backgrounds.html">Dosya Galerileri</a></li>
												</ul>
											</li>
											<li>
												<a href="<?php echo base_url("urun-listesi") ?>"  >Ürünler</a>
											</li>
											<li>
												<a href="<?php echo base_url("egitim-listesi") ?>" >Eğitimler</a>
											</li>
											<li>
												<a href="<?php echo base_url() ?>" >Markalar</a>
											</li>
											<li>
												<a href="<?php echo base_url() ?>" >İletişim</a>
											</li>
										</ul>
										<!-- main-menu end -->

										<!-- header dropdown buttons -->
										<div class="header-dropdown-buttons hidden-xs ">
											<div class="btn-group dropdown">
												<button type="button" class="btn dropdown-toggle" data-toggle="dropdown"><i class="icon-search"></i></button>
												<ul class="dropdown-menu dropdown-menu-right dropdown-animation">
													<li>
														<form role="search" class="search-box margin-clear">
															<div class="form-group has-feedback">
																<input type="text" class="form-control" placeholder="Search">
																<i class="icon-search form-control-feedback"></i>
															</div>
														</form>
													</li>
												</ul>
											</div>
											<div class="btn-group dropdown">
												<button type="button" class="btn dropdown-toggle" data-toggle="dropdown"><i class="icon-basket-1"></i><span class="cart-count default-bg">8</span></button>
												<ul class="dropdown-menu dropdown-menu-right dropdown-animation cart">
													<li>
														<table class="table table-hover">
															<thead>
																<tr>
																	<th class="quantity">QTY</th>
																	<th class="product">Product</th>
																	<th class="amount">Subtotal</th>
																</tr>
															</thead>
															<tbody>
																<tr>
																	<td class="quantity">2 x</td>
																	<td class="product"><a href="shop-product.html">Android 4.4 Smartphone</a><span class="small">4.7" Dual Core 1GB</span></td>
																	<td class="amount">$199.00</td>
																</tr>
																<tr>
																	<td class="quantity">3 x</td>
																	<td class="product"><a href="shop-product.html">Android 4.2 Tablet</a><span class="small">7.3" Quad Core 2GB</span></td>
																	<td class="amount">$299.00</td>
																</tr>
																<tr>
																	<td class="quantity">3 x</td>
																	<td class="product"><a href="shop-product.html">Desktop PC</a><span class="small">Quad Core 3.2MHz, 8GB RAM, 1TB Hard Disk</span></td>
																	<td class="amount">$1499.00</td>
																</tr>
																<tr>
																	<td class="total-quantity" colspan="2">Total 8 Items</td>
																	<td class="total-amount">$1997.00</td>
																</tr>
															</tbody>
														</table>
														<div class="panel-body text-right">
															<a href="shop-cart.html" class="btn btn-group btn-gray btn-sm">View Cart</a>
															<a href="shop-checkout.html" class="btn btn-group btn-gray btn-sm">Checkout</a>
														</div>
													</li>
												</ul>
											</div>
										</div>
										<!-- header dropdown buttons end-->

									</div>

								</div>
							</nav>
							<!-- navbar end -->

						</div>
						<!-- main-navigation end -->
					</div>
					<!-- header-second end -->

				</div>
			</div>
		</div>
	</header>
</div>