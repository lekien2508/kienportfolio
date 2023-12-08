<div class="modal fade" id="modalCreateCategory" tabindex="-1" aria-hidden="true" data-bs-backdrop="static">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h1 class="modal-title fs-5">Tạo Danh Mục Mới</h1>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<form id="createCategoryForm">
					<div class="mb-3">
						<label for="categoriesName" class="col-form-label">Tên Danh Mục:</label>
						<input type="text" class="form-control" id="categoriesName" name="name">
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<?php echo anchor(
					'#',
					'Đóng',
					'title="Đóng" class="btn btn-secondary btn-sm" id="closeModalButton" data-bs-dismiss="modal"'
				); ?>
				<?php echo anchor(
					'#',
					'Tạo Danh Mục',
					'title="Tạo Danh Mục" class="btn btn-success btn-sm" id="createCategoryButton"'
				); ?>
			</div>
		</div>
	</div>
</div>