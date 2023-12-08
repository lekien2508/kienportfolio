$(document).ready(function(){
	////////// Set up csrf token ajax from meta tag
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="X-CSRF-TOKEN"]').attr('content')
		}
	});

	////////// Binding Data from Controller to jQuery DataTable
	$('#categoriesTable').DataTable({
		ajax: {
			url: 'fetch-categories',
			dataSrc: 'categories',
			type: 'GET',
		},
		columns:[
			{data: 'id', class: 'col-1'},
			{data: 'name', class: 'col-3'},
			{data: 'created_at', class: 'col-3'},
			{data: 'updated_at', class: 'col-3'},
			{
				data: null,
				class: 'col-2',
				render: function (data){
					let col = `
						<ul class="actions mb-0">
							<li>
								<a href='#' id='editCategoryButton' class='btn btn-primary btn-sm'>Edit</a>
							</li>
							<li>
								<a href='#' id='deleteCategoryButton' class='btn btn-danger btn-sm'>Delete</a>
							</li>
						</ul>
					`;
					return col;
				}
			}
		],
		autoWidth:false,
		order:[[0, 'desc']],
	});
	//////////

	////////// Create new category
	$(document).on('click', '#createCategoryButton', function(e){
		e.preventDefault();
		var name = $('#categoriesName').val();
		$.ajax({
			url:'create-category',
			type: 'POST',
			data:{name: name},
			success: function (response){
				toastNotification(response);
			},
			error: function (err){
				alert(err.responseText);
			}
		});
	});
	//////////

	////////// Close Modal with reset form to empty
	$(document).on('click', '#closeModalButton', function(e){
		$('#createCategoryForm')[0].reset();
	});
	//////////

	////////// Edit row
	$(document).on('click', '#editCategoryButton', function(e){
		e.preventDefault();
		let row = $(this).closest('tr');
		let cells = row.find('td:nth-child(2)');
		//Change cells on row to form input
		cells.each(function () {
			let cellData = $(this).text();
			$(this).data('cat-originaldata', cellData);
			$(this).addClass('p-0');
			let input = `<input type='text' class='form-control form-control-sm p-1' value='${cellData}'>`;
			$(this).html(input);
		});
		let updateButton = `<a href='#' class='btn btn-primary btn-sm' id='updateCategoryButton'>Update</a>`;
		let cancelButton = `<a href='#' class='btn btn-danger btn-sm' id='cancelCategoryButton'>Cancel</a>`;
		row.find('#editCategoryButton').replaceWith(updateButton);
		row.find('#deleteCategoryButton').replaceWith(cancelButton);
		returnOriginal($('tr').not(row));
	});
	//////////

	////////// Delete category in the same row
	$(document).on('click', '#deleteCategoryButton', function(e){
		e.preventDefault();
		let row = $(this).closest('tr');
		let rowData = $('#categoriesTable').DataTable().row(row).data();
		$.ajax({
			url: 'delete-category',
			type: 'POST',
			data: {id: rowData.id},
			success: function (response){
				toastNotification(response);
			},error:function(err){
				alert(err.responseText);
			}
		});
	});
	//////////

	////////// Update row
	$(document).on('click', '#updateCategoryButton', function(e){
		e.preventDefault();
		let row = $(this).closest('tr');
		let rowData = $('#categoriesTable').DataTable().row(row).data();
		let id = rowData.id;
		let name = row.find('input').val();
		$.ajax({
			url: 'update-category',
			type: 'POST',
			data: {id: id, name: name},
			success: function (response){
				toastNotification(response);
			},error:function(err){
				alert(err.responseText);
			}
		});
	});
	//////////

	////////// Cancel edit row
	$(document).on('click', '#cancelCategoryButton', function(e){
		e.preventDefault();
		let row = $(this).closest('tr');
		returnOriginal(row);
	});
	//////////

	////////// Return form values to original text when click cancel button or another edit button
	function returnOriginal(row){
		let cells = row.find('td:nth-child(2)');
		cells.each(function(){
			let originalData = $(this).data('cat-originaldata');
			$(this).removeClass('p-0');
			$(this).html(originalData);
		});
		let editButton = `<a href='#' class='btn btn-primary btn-sm' id='editCategoryButton'>Edit</a>`;
		let deleteButton = `<a href='#' class='btn btn-danger btn-sm' id='deleteCategoryButton'>Delete</a>`;
		row.find('#cancelCategoryButton').replaceWith(deleteButton);
		row.find('#updateCategoryButton').replaceWith(editButton);
	}
	//////////

	////////// Create Toasts Notificaions
	function toastNotification(response){
		// Call function createToastNotification to create toast board
		if(response.success){
			createToastNotification(response.title, response.success);
			//Reload table only with ajax if everything is success, not reload all page
			$('#categoriesTable').DataTable().ajax.reload();
		}else{
			createToastNotification(response.title, response.fail);
		}
		// Create array of toasts notification for calling toasts many times
		let toastElList = [].slice.call(document.querySelectorAll('.toast'));
		let toastList = toastElList.map(function(toastEl) {
			return new bootstrap.Toast(toastEl);
		});
		toastList.forEach(toast => toast.show());
	}
	//////////

	////////// Create Toast Board
	function createToastNotification(title, content){
		let toast = `
			<div class="toast-container position-fixed bottom-0 end-0 p-3">
			  <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
				<div class="toast-header">
				  <img src="..." class="rounded me-2" alt="...">
				  <strong class="me-auto">${title}</strong>
<!--				  <small>11 mins ago</small>-->
				  <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
				</div>
				<div class="toast-body">
				  ${content}
				</div>
			  </div>
			</div>
		`;
		$('#wrapper').append(toast);
	}
	//////////
});