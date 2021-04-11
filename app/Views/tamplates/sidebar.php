<div class="header">
	<div class="header-left">
		<div class="menu-icon dw dw-menu"></div>
		<div class="search-toggle-icon dw dw-search2" data-toggle="header_search"></div>
		<div class="header-search">
			<input class="form-control time-picker col-md-3" disabled type="read">
		</div>
	</div>
	<div class="header-right">
		<div class="dashboard-setting user-notification">
			<div class="dropdown">
				<a class="dropdown-toggle no-arrow" href="javascript:;" data-toggle="right-sidebar">
					<i class="dw dw-settings2"></i>
				</a>
			</div>
		</div>
		<div class="user-info-dropdown">
			<div class="dropdown">
				<a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
					<span class="user-icon">
						<img src="<?php base_url(); ?>/image/<?= user()->user_image; ?>" alt="">
					</span>
					<span class="user-name"><?= user()->username; ?></span>
				</a>
				<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
					<a class="dropdown-item" href="/Users/Ui/profile/<?= user()->id ?> "><i class="dw dw-user1"></i> Profile</a>
					<a class="dropdown-item" href="profile.html"><i class="dw dw-settings2"></i> Setting</a>
					<a class="dropdown-item" href="faq.html"><i class="dw dw-help"></i> Help</a>
					<a class="dropdown-item" href="<?php echo  base_url('logout'); ?>"><i class="dw dw-logout"></i> Log Out</a>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="right-sidebar">
	<div class="sidebar-title">
		<h3 class="weight-600 font-16 text-blue">
			Layout Settings
			<span class="btn-block font-weight-400 font-12">User Interface Settings</span>
		</h3>
		<div class="close-sidebar" data-toggle="right-sidebar-close">
			<i class="icon-copy ion-close-round"></i>
		</div>
	</div>
	<div class="right-sidebar-body customscroll">
		<div class="right-sidebar-body-content">
			<h4 class="weight-600 font-18 pb-10">Header Background</h4>
			<div class="sidebar-btn-group pb-30 mb-10">
				<a href="javascript:void(0);" class="btn btn-outline-primary header-white active">White</a>
				<a href="javascript:void(0);" class="btn btn-outline-primary header-dark">Dark</a>
			</div>

			<h4 class="weight-600 font-18 pb-10">Sidebar Background</h4>
			<div class="sidebar-btn-group pb-30 mb-10">
				<a href="javascript:void(0);" class="btn btn-outline-primary sidebar-light ">White</a>
				<a href="javascript:void(0);" class="btn btn-outline-primary sidebar-dark active">Dark</a>
			</div>

			<h4 class="weight-600 font-18 pb-10">Menu Dropdown Icon</h4>
			<div class="sidebar-radio-group pb-10 mb-10">
				<div class="custom-control custom-radio custom-control-inline">
					<input type="radio" id="sidebaricon-1" name="menu-dropdown-icon" class="custom-control-input" value="icon-style-1" checked="">
					<label class="custom-control-label" for="sidebaricon-1"><i class="fa fa-angle-down"></i></label>
				</div>
				<div class="custom-control custom-radio custom-control-inline">
					<input type="radio" id="sidebaricon-2" name="menu-dropdown-icon" class="custom-control-input" value="icon-style-2">
					<label class="custom-control-label" for="sidebaricon-2"><i class="ion-plus-round"></i></label>
				</div>
				<div class="custom-control custom-radio custom-control-inline">
					<input type="radio" id="sidebaricon-3" name="menu-dropdown-icon" class="custom-control-input" value="icon-style-3">
					<label class="custom-control-label" for="sidebaricon-3"><i class="fa fa-angle-double-right"></i></label>
				</div>
			</div>

			<h4 class="weight-600 font-18 pb-10">Menu List Icon</h4>
			<div class="sidebar-radio-group pb-30 mb-10">
				<div class="custom-control custom-radio custom-control-inline">
					<input type="radio" id="sidebariconlist-1" name="menu-list-icon" class="custom-control-input" value="icon-list-style-1" checked="">
					<label class="custom-control-label" for="sidebariconlist-1"><i class="ion-minus-round"></i></label>
				</div>
				<div class="custom-control custom-radio custom-control-inline">
					<input type="radio" id="sidebariconlist-2" name="menu-list-icon" class="custom-control-input" value="icon-list-style-2">
					<label class="custom-control-label" for="sidebariconlist-2"><i class="fa fa-circle-o" aria-hidden="true"></i></label>
				</div>
				<div class="custom-control custom-radio custom-control-inline">
					<input type="radio" id="sidebariconlist-3" name="menu-list-icon" class="custom-control-input" value="icon-list-style-3">
					<label class="custom-control-label" for="sidebariconlist-3"><i class="dw dw-check"></i></label>
				</div>
				<div class="custom-control custom-radio custom-control-inline">
					<input type="radio" id="sidebariconlist-4" name="menu-list-icon" class="custom-control-input" value="icon-list-style-4" checked="">
					<label class="custom-control-label" for="sidebariconlist-4"><i class="icon-copy dw dw-next-2"></i></label>
				</div>
				<div class="custom-control custom-radio custom-control-inline">
					<input type="radio" id="sidebariconlist-5" name="menu-list-icon" class="custom-control-input" value="icon-list-style-5">
					<label class="custom-control-label" for="sidebariconlist-5"><i class="dw dw-fast-forward-1"></i></label>
				</div>
				<div class="custom-control custom-radio custom-control-inline">
					<input type="radio" id="sidebariconlist-6" name="menu-list-icon" class="custom-control-input" value="icon-list-style-6">
					<label class="custom-control-label" for="sidebariconlist-6"><i class="dw dw-next"></i></label>
				</div>
			</div>

			<div class="reset-options pt-30 text-center">
				<button class="btn btn-danger" id="reset-settings">Reset Settings</button>
			</div>
		</div>
	</div>
</div>

<div class="left-side-bar">
	<div class="brand-logo">
		<a href="<?php echo base_url('dashboard') ?>">
			<img src="<?= base_url('assets/vendors/images/SMK.png') ?> " alt="" class="dark-logo">
			<img src="<?= base_url('assets/vendors/images/SMK1.png') ?>  " alt="" class="light-logo">
		</a>
		<div class="close-sidebar" data-toggle="left-sidebar-close">
			<i class="ion-close-round"></i>
		</div>
	</div>
	<div class="menu-block customscroll">
		<div class="sidebar-menu">
			<a href="<?php echo base_url('dashboard') ?>" class="dropdown-toggle no-arrow">
				<span class=" micon fa fa-dashboard"></span>
				<span class=" mtext">Dashboard</span>
			</a>
			<ul id="accordion-menu">
				<?php if (in_groups('super_admin')) : ?>
					<li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle">
							<span class="micon dw dw-list"></span><span class="mtext">SuperAdmin</span>
						</a>
						<ul class="submenu">
							<li><a href="<?php echo base_url('userlist') ?>">User List</a></li>
							<li><a href="<?= base_url('walikelas') ?>">Wali Kelas</a></li>
							<li><a href="<?= base_url('kelas') ?>">Data Kelas</a></li>
							<li><a href="<?= base_url('spp') ?>">Data SPP</a></li>
							<li><a href="<?= base_url('siswa') ?>">Data Siswa</a></li>
							<li><a href="<?= base_url('transaksi') ?>">Input Transaksi SPP</a></li>



						</ul>
						<!-- <li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle">
							<span class="micon dw dw-paper-plane"><i class="far fa-file-alt" aria-hidden="true"></i></span><span class=" mtext">Transaksi SPP</span>
						</a>
						<ul class="submenu">
							<li><a href="<?= base_url('pembayaran') ?>">Pembayaran</a></li>
							<li><a href=" Users/Ui/history_spp/<?= user()->id ?>">history Pembayaran</a></li>
						</ul>
					</li>
					</li> -->
						<a href="<?= base_url('invoice_admin') ?>" target="_blank" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-invoice"></span>
							<span class="mtext">Laporan Pembayaran</span>
						</a>
						<a href="<?= base_url('laporanadmin') ?>" target="_blank" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-file3"></span>
							<span class="mtext">Laporan</span>
						</a>
					<?php endif; ?>

					<?php if (in_groups('Admin')) : ?>
					<li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle">
							<span class="micon dw dw-list"></span><span class="mtext">Admin</span>
						</a>
						<ul class="submenu">
							<li><a href="<?= base_url('transaksi') ?>">Input Transaksi SPP</a></li>
							<li><a href="<?= base_url('siswa') ?>">Data Siswa</a></li>
						</ul>
					</li>
					<a href="<?= base_url('invoice_admin') ?>" target="_blank" class="dropdown-toggle no-arrow">
						<span class="micon dw dw-invoice"></span>
						<span class="mtext">Invoice SPP</span>
					</a>
					<a href="<?= base_url('laporanadmin') ?>" target="_blank" class="dropdown-toggle no-arrow">
						<span class="micon dw dw-file3"></span>
						<span class="mtext">Laporan</span>
					</a>
				<?php endif; ?>

				<?php if (in_groups('user')) : ?>
					<li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle">
							<span class="micon dw dw-paper-plane"></span><span class="mtext">Transaksi SPP</span>
						</a>
						<ul class="submenu">
							<li><a href="<?= base_url('pembayaran') ?>">Pembayaran</a></li>
							<li><a href=" Users/Ui/history_spp/<?= user()->id ?>">history Pembayaran</a></li>
						</ul>
					</li>
					<a href="/Users/Ui/laporan_spp/<?php echo user()->nisn  ?>" target="_blank" class="dropdown-toggle no-arrow">
						<span class=" micon dw dw-sheet""></span>
						<span class=" mtext">Laporan SPP</span>
					</a>
					<a href="<?php echo base_url('Users/Ui/contact') ?>" target="_blank" class="dropdown-toggle no-arrow">
						<span class="micon dw dw-phone-call"></span>
						<span class="mtext">Contact Admin <img src="vendors/images/coming-soon.png" alt="" width="25"></span>
					</a>
				<?php endif; ?>
			</ul>

		</div>
	</div>
</div>
<div class="mobile-menu-overlay"></div>