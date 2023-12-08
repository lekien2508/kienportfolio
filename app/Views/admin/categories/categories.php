<?php echo $this->extend('admin/master_layout'); ?>
<?php echo $this->section('content'); ?>
	<section class="pt-0">
		<header class="major">
			<h2>QUẢN LÝ DANH MỤC BÀI VIẾT</h2>
		</header>
		<ul class="actions">
			<li>
				<?php echo anchor(
						'#',
						'Tạo Danh Mục',
						'title="Tạo Danh Mục" class="button" id="btnCreateModal" data-bs-toggle="modal" data-bs-target="#modalCreateCategory"'
				); ?>
			</li>
		</ul>
		<div>
			<table id="categoriesTable" class="table table-sm">
				<thead>
					<tr>
						<th class="col-1">ID</th>
						<th class="col-3">Tên Danh Mục</th>
						<th class="col-3">Ngày Tạo</th>
						<th class="col-3">Ngày Sửa Gần Nhất</th>
						<th class="col-2">Thao Tác</th>
					</tr>
				</thead>
			</table>
		</div>
	</section>
	<?php echo $this->include('/admin/categories/createCategoryModal'); ?>
<?php echo $this->endSection(); ?>
