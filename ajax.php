<?php

include "function.php";


// ******************************** Locations ****************************************

if(isset($_POST['action']) && $_POST['action'] == 'display_locations') {
	$output = '';
	$query = mysqli_query($conn, "SELECT * FROM locations WHERE delete_status='0'");
	if(mysqli_num_rows($query) > 0) {
		$i = 1;
		while($result = mysqli_fetch_assoc($query)) {
			$output .= "<tr>";
			$output .= "<td>".$result['location_name']."</td>";
			$output .= "<td>".$result['location_address']."</td>";
			$output .= "<td>".$result['location_city']."</td>";
			$output .= "<td>";
			if($result['active_status'] == 1) {
				$output .= "<span class='badge badge-success location_status_btn' data-id='".$result['id']."'>Active</span>";
			} else {
				$output .= "<span class='badge badge-danger location_status_btn' data-id='".$result['id']."'>Inactive</span>";
			}
			$output .= "</td>";
			$output .= "<td><div class='btn-group'>";
			if(is_superadmin() || is_admin()) {
				$output .= "<button class='btn btn-primary edit_location_btn btn-sm' data-id='".$result['id']."'><i class='fas fa-edit'></i></button>";
				$output .= "<button class='btn btn-danger delete_location_btn btn-sm' data-id='".$result['id']."'><i class='fas fa-trash'></i></button>";
			}
			$output .= "</div></td>";
			$output .= "</tr>";
			$i++;
		}
	} else {
		$output .= "<tr><td colspan='5' class='text-center'>No Record Found</td></tr>";
	}

	echo $output;
}



if(isset($_POST['action']) && $_POST['action'] == 'add_location') {
	$location_name = strip_tags(mysqli_real_escape_string($conn, $_POST['add_location_name']));
	$location_address = strip_tags(mysqli_real_escape_string($conn, $_POST['add_location_address']));
	$location_city = strip_tags(mysqli_real_escape_string($conn, $_POST['add_location_city']));

	if($location_name != '' && $location_address != '' && $location_city != '') {
		if(mysqli_num_rows(mysqli_query($conn, "SELECT * FROM locations WHERE location_name='$location_name'")) == 0) {
			$query = mysqli_query($conn, "INSERT INTO locations(location_name, location_address, location_city, time_created) VALUES('$location_name', '$location_address', '$location_city', '$time_created')");
			if($query) {
				echo 3;
			} else {
				echo 2;
			}
		} else {
			echo 1;
		}
	} else {
		echo 0;
	}
}



if(isset($_POST['action']) && $_POST['action'] == 'display_edit_location_form') {
	$id = strip_tags(mysqli_real_escape_string($conn, $_POST['id']));
	$output = '';

	if($id != '' && $id != 0) {
		$query = mysqli_query($conn, "SELECT * FROM locations WHERE id='$id' && delete_status='0'");
		if(mysqli_num_rows($query) > 0) {
			$result = mysqli_fetch_assoc($query);
			$output .= '<input type="hidden" value="edit_location" name="action">';
			$output .= '<input type="hidden" value="'.$result['id'].'" name="edit_location_id">';
			$output .= '<div class="mb-3">';
				$output .= '<label>Name:</label>';
				$output .= '<input type="text" class="form-control form-control-border" placeholder="Enter Location Name" id="edit_location_name" value="'.$result['location_name'].'" name="edit_location_name">';
			$output .= '</div>';
			$output .= '<div class="mb-3">';
				$output .= '<label>Address:</label>';
				$output .= '<textarea class="form-control form-control-border" placeholder="Enter Address" id="edit_location_address" name="edit_location_address">'.$result['location_address'].'</textarea>';
			$output .= '</div>';
			$output .= '<div class="mb-3">';
				$output .= '<label>City:</label>';
				$output .= '<input type="text" class="form-control form-control-border" placeholder="Enter City" id="edit_location_city" value="'.$result['location_city'].'" name="edit_location_city">';
			$output .= '</div>';
			$output .= '<button class="btn btn-primary" type="submit" name="edit_location_btn" id="edit_location_btn">Edit Location</button>';
		}
	}

	echo $output;
}


if(isset($_POST['action']) && $_POST['action'] == 'edit_location') {
	$id = strip_tags(mysqli_real_escape_string($conn, $_POST['edit_location_id']));
	$location_name = strip_tags(mysqli_real_escape_string($conn, $_POST['edit_location_name']));
	$location_address = strip_tags(mysqli_real_escape_string($conn, $_POST['edit_location_address']));
	$location_city = strip_tags(mysqli_real_escape_string($conn, $_POST['edit_location_city']));

	if($location_name != '' && $location_address != '' && $location_city != '') {
		if(is_superadmin() || is_admin()) {
			if(mysqli_num_rows(mysqli_query($conn, "SELECT * FROM locations WHERE location_name='$location_name'")) == 0) {
				$query = mysqli_query($conn, "UPDATE locations SET location_name='$location_name', location_address='$location_address', location_city='$location_city' WHERE id='$id'");
				// $query = mysqli_query($conn, "INSERT INTO locations(location_name, location_address, location_city, time_created) VALUES('$location_name', '$location_address', '$location_city', '$time_created')");
				if($query) {
					echo 3;
				} else {
					echo 2;
				}
			} else {
				echo 1;
			}
		}
	} else {
		echo 0;
	}
}



if(isset($_POST['action']) && $_POST['action'] == 'delete_location') {
	$id = strip_tags(mysqli_real_escape_string($conn, $_POST['id']));

	if($id != '' && $id != 0) {
		if(is_superadmin() || is_admin()) {
			$query = mysqli_query($conn, "UPDATE locations SET delete_status='1' WHERE id='$id'");
			if($query) {
				echo 2;
			} else {
				echo 1;
			}
		}
	} else {
		echo 0;
	}
}


if(isset($_POST['action']) && $_POST['action'] == 'display_select_locations') {
	$output = '';
	$query = mysqli_query($conn, "SELECT * FROM locations WHERE delete_status='0'");
	$output .= "<option value=''>Select Location</option>";
	if(mysqli_num_rows($query) > 0) {
		$i = 1;
		while($result = mysqli_fetch_assoc($query)) {
			$output .= "<option value='".$result['id']."'>".$result['location_name']."</option>";
			$i++;
		}
	}

	echo $output;
}



// ******************************** Departments ****************************************


if(isset($_POST['action']) && $_POST['action'] == 'display_departments') {
	$output = '';
	$query = mysqli_query($conn, "SELECT * FROM departments WHERE delete_status='0'");
	if(mysqli_num_rows($query) > 0) {
		$i = 1;
		while($result = mysqli_fetch_assoc($query)) {

			$output .= "<tr>";
			// $output .= "<td>".$i."</td>";
			$output .= "<td><a href='deploy_assets.php?id=".$result['id']."&type=2' class='text-white' style='text-decoration: underline;'>".department_name($result['id'])."</a></td>";
			$output .= "<td>".location_name($result['location_id'])."</td>";
			$output .= "<td>";
			if($result['active_status'] == 1) {
				$output .= "<span class='badge badge-success location_status_btn' data-id='".$result['id']."'>Active</span>";
			} else {
				$output .= "<span class='badge badge-danger location_status_btn' data-id='".$result['id']."'>Inactive</span>";
			}
			$output .= "</td>";
			$output .= "<td><div class='btn-group'>";
			if(is_superadmin() || is_admin()) {
				$output .= "<button class='btn btn-primary edit_department_btn btn-sm' data-id='".$result['id']."'><i class='fas fa-edit'></i></button>";
				$output .= "<button class='btn btn-danger delete_department_btn btn-sm' data-id='".$result['id']."'><i class='fas fa-trash'></i></button>";
			}
			$output .= "</div></td>";
			$output .= "</tr>";

			$i++;
		}
	} else {
		$output .= "<tr><td colspan='4' class='text-center'>No Record Found</td></tr>";
	}

	echo $output;
}


if(isset($_POST['action']) && $_POST['action'] == 'add_department') {

	$department_name = strip_tags(mysqli_real_escape_string($conn, $_POST['add_department_name']));
	$department_location = strip_tags(mysqli_real_escape_string($conn, $_POST['add_department_location']));

	if($department_name != '' && $department_location != '') {
		if(mysqli_num_rows(mysqli_query($conn, "SELECT * FROM departments WHERE department_name='$department_name' && location_id='$department_location' && delete_status='0'")) == 0) {
			$query = mysqli_query($conn, "INSERT INTO departments(department_name, location_id, time_created) VALUES('$department_name', '$department_location', '$time_created')");
			if($query) {
				echo 3;
			} else {
				echo 2;
			}
		} else {
			echo 1;
		}
	} else {
		echo 0;
	}
}


if(isset($_POST['action']) && $_POST['action'] == 'display_edit_department_form') {
	$id = strip_tags(mysqli_real_escape_string($conn, $_POST['id']));
	$output = '';

	if($id != '' && $id != 0) {
		$query = mysqli_query($conn, "SELECT * FROM departments WHERE id='$id' && delete_status='0'");
		if(mysqli_num_rows($query) > 0) {
			$result = mysqli_fetch_assoc($query);
			if($result['active_status'] == 1) { $active_status='checked'; $inactive_status = ''; } else { $active_status=''; $inactive_status = 'checked'; }
			$output .= '<input type="hidden" value="edit_department" name="action">';
			$output .= '<input type="hidden" value="'.$result['id'].'" name="edit_department_id">';
			$output .= '<div class="mb-3">';
				$output .= '<label>Name:</label>';
				$output .= '<input type="text" class="form-control form-control-border" placeholder="Enter Department Name" id="edit_department_name" value="'.$result['department_name'].'" name="edit_department_name">';
			$output .= '</div>';
			$output .= '<div class="mb-3">';
				$output .= '<label>Location:</label>';
				$output .= "<select class='form-control' name='edit_department_location' id='edit_department_location'>";
				$location_query = mysqli_query($conn, "SELECT * FROM locations WHERE delete_status='0'");
				if(mysqli_num_rows($location_query) > 0) {
					while($location_result = mysqli_fetch_assoc($location_query)) {

						if($location_result['id'] == $result['location_id']) { $selected = 'selected'; } else { $selected = ''; }

						$output .= "<option ".$selected." value='".$location_result['id']."'>".$location_result['location_name']."</option>";
					}
				}
				$output .= "</select>";
			$output .= '</div>';
			$output .= '<fieldset class="form-group row">';
				$output .= '<legend class="col-form-label col-sm-2 float-sm-left pt-0">Status</legend>';
				$output .= '<div class="col-sm-10">';
					$output .= '<div class="form-check">';
						$output .= '<input class="form-check-input" type="radio" name="edit_department_status" id="active" value="1" '.$active_status.'>';
						$output .= '<label class="form-check-label" for="active">Active</label>';
					$output .= '</div>';
					$output .= '<div class="form-check">';
						$output .= '<input class="form-check-input" type="radio" name="edit_department_status" id="inactive" value="0" '.$inactive_status.'>';
						$output .= '<label class="form-check-label" for="inactive">Inactive</label>';
					$output .= '</div>';
				$output .= '</div>';
			$output .= '</fieldset>';
			$output .= '<button class="btn btn-primary" type="submit" name="edit_department_btn" id="edit_department_btn">Edit Department</button>';
		}
	}

	echo $output;
}


if(isset($_POST['action']) && $_POST['action'] == 'edit_department') {
	$id = strip_tags(mysqli_real_escape_string($conn, $_POST['edit_department_id']));
	$department_name = strip_tags(mysqli_real_escape_string($conn, $_POST['edit_department_name']));
	$department_location = strip_tags(mysqli_real_escape_string($conn, $_POST['edit_department_location']));
	$active_status = strip_tags(mysqli_real_escape_string($conn, $_POST['edit_department_status']));

	if($department_name != '' && $department_location != '') {
		if(is_superadmin() || is_admin()) {
			$query = mysqli_query($conn, "UPDATE departments SET department_name='$department_name', location_id='$department_location', active_status='$active_status' WHERE id='$id'");
			if($query) {
				echo 3;
			} else {
				echo 2;
			}
		}
	} else {
		echo 0;
	}
}


if(isset($_POST['action']) && $_POST['action'] == 'delete_department') {
	$id = strip_tags(mysqli_real_escape_string($conn, $_POST['id']));

	if($id != '' && $id != 0) {
		if(is_superadmin() || is_admin()) {
			$query = mysqli_query($conn, "UPDATE departments SET delete_status='1' WHERE id='$id'");
			if($query) {
				echo 2;
			} else {
				echo 1;
			}
		}
	} else {
		echo 0;
	}
}


if(isset($_POST['action']) && $_POST['action'] == 'display_select_departments') {
	$output = '';
	$query = mysqli_query($conn, "SELECT * FROM departments WHERE delete_status='0' ORDER BY id DESC");
	$output .= "<option value=''>Select Department</option>";
	if(mysqli_num_rows($query) > 0) {
		$i = 1;
		while($result = mysqli_fetch_assoc($query)) {
			$output .= "<option value='".$result['id']."'>".$result['department_name']." - ".location_name($result['location_id'])."</option>";
			$i++;
		}
	}

	echo $output;
}




// ******************************** Peoples ****************************************


if(isset($_POST['action']) && $_POST['action'] == 'display_peoples') {
	$output = '';
	$query = mysqli_query($conn, "SELECT * FROM peoples WHERE delete_status='0'");
	if(mysqli_num_rows($query) > 0) {
		$i = 1;
		while($result = mysqli_fetch_assoc($query)) {

			$output .= "<tr>";
			$output .= "<td>".$result['people_id']."</td>";
			$output .= "<td><a href='deploy_assets.php?id=".$result['id']."&&type=1' class='text-white' style='text-decoration: underline;'>".people_name($result['id'])."</a></td>";
			$output .= "<td>".$result['designation']."</td>";
			$output .= "<td>".department_name($result['department_id'])."</td>";
			$output .= "<td>".location_name(department_location_id($result['id']))."</td>";
			$output .= "<td>";
			if($result['active_status'] == 1) {
				$output .= "<span class='badge badge-success location_status_btn' data-id='".$result['id']."'>Active</span>";
			} else {
				$output .= "<span class='badge badge-danger location_status_btn' data-id='".$result['id']."'>Inactive</span>";
			}
			$output .= "</td>";
			$output .= "<td><div class='btn-group'>";
			if(is_superadmin() || is_admin()) {
				$output .= "<button class='btn btn-primary edit_people_btn btn-sm' data-id='".$result['id']."'><i class='fas fa-edit'></i></button>";
				$output .= "<button class='btn btn-danger delete_people_btn btn-sm' data-id='".$result['id']."'><i class='fas fa-trash'></i></button>";
			}
			$output .= "</div></td>";
			$output .= "</tr>";

			$i++;
		}
	} else {
		$output .= "<tr><td colspan='5' class='text-center'>No Record Found</td></tr>";
	}

	echo $output;
}


if(isset($_POST['action']) && $_POST['action'] == 'add_people') {

	$people_id = strip_tags(mysqli_real_escape_string($conn, $_POST['add_people_id']));
	$people_name = strip_tags(mysqli_real_escape_string($conn, $_POST['add_people_name']));
	$people_designation = strip_tags(mysqli_real_escape_string($conn, $_POST['add_people_designation']));
	$people_department = strip_tags(mysqli_real_escape_string($conn, $_POST['add_people_department']));

	if($people_id != '' && $people_name != '' && $people_designation != '' && $people_department != '') {
		if(mysqli_num_rows(mysqli_query($conn, "SELECT * FROM peoples WHERE people_id='$people_id' && delete_status='0'")) == 0) {
			$query = mysqli_query($conn, "INSERT INTO peoples(people_id, people_name, designation, department_id, time_created) VALUES('$people_id', '$people_name', '$people_designation', '$people_department', '$time_created')");
			if($query) {
				echo 3;
			} else {
				echo 2;
			}
		} else {
			echo 1;
		}
	} else {
		echo 0;
	}
}


if(isset($_POST['action']) && $_POST['action'] == 'display_edit_people_form') {
	$id = strip_tags(mysqli_real_escape_string($conn, $_POST['id']));
	$output = '';

	if($id != '' && $id != 0) {
		$query = mysqli_query($conn, "SELECT * FROM peoples WHERE id='$id' && delete_status='0'");
		if(mysqli_num_rows($query) > 0) {
			$result = mysqli_fetch_assoc($query);
			if($result['active_status'] == 1) { $active_status='checked'; $inactive_status = ''; } else { $active_status=''; $inactive_status = 'checked'; }
			$output .= '<input type="hidden" value="edit_people" name="action">';
			$output .= '<input type="hidden" value="'.$result['id'].'" name="edit_people_id">';
			$output .= '<div class="mb-3">';
				$output .= '<label>Emp ID:</label>';
				$output .= '<input type="text" class="form-control form-control-border" placeholder="Enter Emp ID" id="edit_people_id" value="'.$result['people_id'].'" name="edit_employee_id">';
			$output .= '</div>';
			$output .= '<div class="mb-3">';
				$output .= '<label>Name:</label>';
				$output .= '<input type="text" class="form-control form-control-border" placeholder="Enter Employee Name" id="edit_people_name" value="'.$result['people_name'].'" name="edit_people_name">';
			$output .= '</div>';
			$output .= '<div class="mb-3">';
				$output .= '<label>Designation:</label>';
				$output .= '<input type="text" class="form-control form-control-border" placeholder="Enter Designation" id="edit_people_designation" value="'.$result['designation'].'" name="edit_people_designation">';
			$output .= '</div>';
			$output .= '<div class="mb-3">';
				$output .= '<label>Department:</label>';
				$output .= "<select class='form-control' name='edit_people_department' id='edit_people_department'>";
				$department_query = mysqli_query($conn, "SELECT * FROM departments WHERE delete_status='0'");
				if(mysqli_num_rows($department_query) > 0) {
					while($department_result = mysqli_fetch_assoc($department_query)) {

						if($department_result['id'] == $result['department_id']) { $selected = 'selected'; } else { $selected = ''; }

						// $output .= "<option ".$selected." value='".$department_result['id']."'>".$location_result['location_name']."</option>";
						$output .= "<option ".$selected." value='".$department_result['id']."'>".$department_result['department_name']." - ".location_name($department_result['location_id'])."</option>";
					}
				}
				$output .= "</select>";
			$output .= '</div>';
			$output .= '<fieldset class="form-group row">';
				$output .= '<legend class="col-form-label col-sm-2 float-sm-left pt-0">Status</legend>';
				$output .= '<div class="col-sm-10">';
					$output .= '<div class="form-check">';
						$output .= '<input class="form-check-input" type="radio" name="edit_people_status" id="active" value="1" '.$active_status.'>';
						$output .= '<label class="form-check-label" for="active">Active</label>';
					$output .= '</div>';
					$output .= '<div class="form-check">';
						$output .= '<input class="form-check-input" type="radio" name="edit_people_status" id="inactive" value="0" '.$inactive_status.'>';
						$output .= '<label class="form-check-label" for="inactive">Inactive</label>';
					$output .= '</div>';
				$output .= '</div>';
			$output .= '</fieldset>';
			$output .= '<button class="btn btn-primary" type="submit" name="edit_department_btn" id="edit_department_btn">Edit People</button>';
		}
	}

	echo $output;
}


if(isset($_POST['action']) && $_POST['action'] == 'edit_people') {
	$id = strip_tags(mysqli_real_escape_string($conn, $_POST['edit_people_id']));
	$people_id = strip_tags(mysqli_real_escape_string($conn, $_POST['edit_employee_id']));
	$people_name = strip_tags(mysqli_real_escape_string($conn, $_POST['edit_people_name']));
	$people_designation = strip_tags(mysqli_real_escape_string($conn, $_POST['edit_people_designation']));
	$people_department = strip_tags(mysqli_real_escape_string($conn, $_POST['edit_people_department']));
	$active_status = strip_tags(mysqli_real_escape_string($conn, $_POST['edit_people_status']));

	if($people_id != '' && $people_name != '' && $people_designation != '' && $people_department != '') {
		// if(is_superadmin() || is_admin()) {
			$query = mysqli_query($conn, "UPDATE peoples SET people_id='$people_id', people_name='$people_name', designation='$people_designation', department_id='$people_department', active_status='$active_status' WHERE id='$id'");
			if($query) {
				echo 3;
			} else {
				echo 2;
			}
		// }
	} else {
		echo 0;
	}
}


if(isset($_POST['action']) && $_POST['action'] == 'delete_people') {
	$id = strip_tags(mysqli_real_escape_string($conn, $_POST['id']));

	if($id != '' && $id != 0) {
		if(is_superadmin() || is_admin()) {
			$query = mysqli_query($conn, "UPDATE peoples SET delete_status='1' WHERE id='$id'");
			if($query) {
				echo 2;
			} else {
				echo 1;
			}
		}
	} else {
		echo 0;
	}
}


if(isset($_POST['action']) && $_POST['action'] == 'display_select_peoples') {
	$output = '';
	$query = mysqli_query($conn, "SELECT * FROM peoples WHERE delete_status='0' ORDER BY id DESC");
	$output .= "<option value=''>Select Employee</option>";
	if(mysqli_num_rows($query) > 0) {
		$i = 1;
		while($result = mysqli_fetch_assoc($query)) {
			$department_query = mysqli_query($conn, "SELECT * FROM departments WHERE id='{$result['department_id']}'");
			if(mysqli_num_rows($department_query) > 0) {
				$department_result = mysqli_fetch_assoc($department_query);
				$output .= "<option value='".$result['id']."'>".$result['people_name']." - ".department_name($result['department_id'])." - ".location_name($department_result['location_id'])." - ".$result['people_id']."</option>";
			}
			$i++;
		}
	}

	echo $output;
}






// ******************************** Users ****************************************


if(isset($_POST['action']) && $_POST['action'] == 'display_users') {
	$output = '';
	$query = mysqli_query($conn, "SELECT * FROM users WHERE delete_status='0'");
	if(mysqli_num_rows($query) > 0) {
		$i = 1;
		while($result = mysqli_fetch_assoc($query)) {

			$output .= "<tr>";
			// $output .= "<td>".$i."</td>";
			$output .= "<td>".display_name($result['id'])."</td>";
			$output .= "<td>".$result['user_login']."</td>";
			$output .= "<td>";
			if($result['role'] == 0 && $result['type'] == 0) {
				$output .= "Super Admin";
			} else if($result['role'] == 0 && $result['type'] == 1) {
				$output .= "Admin";
			} else if($result['role'] == 1 && $result['type'] == 1) {
				$output .= "User";
			}
			$output .= "</td>";
			$output .= "<td>";
			if($result['active_status'] == 1) {
				$output .= "<span class='badge badge-success user_status_btn' data-id='".$result['id']."'>Active</span>";
			} else {
				$output .= "<span class='badge badge-danger user_status_btn' data-id='".$result['id']."'>Inactive</span>";
			}
			$output .= "</td>";
			$output .= "<td><div class='btn-group'>";
			if(is_superadmin()) {
				$output .= "<button class='btn btn-primary edit_user_btn btn-sm' data-id='".$result['id']."'><i class='fas fa-edit'></i></button>";
				if(($result['role'] == 0 && $result['type'] == 1) || ($result['role'] == 1 && $result['type'] == 1)) {
					$output .= "<button class='btn btn-danger delete_user_btn btn-sm' data-id='".$result['id']."'><i class='fas fa-trash'></i></button>";
				}
			} else if(is_admin()) {
				if($result['role'] == 1 && $result['type'] == 1) {
					$output .= "<button class='btn btn-primary edit_user_btn btn-sm' data-id='".$result['id']."'><i class='fas fa-edit'></i></button>";
					$output .= "<button class='btn btn-danger delete_user_btn btn-sm' data-id='".$result['id']."'><i class='fas fa-trash'></i></button>";
				}
			}
			$output .= "</div></td>";
			$output .= "</tr>";

			$i++;
		}
	} else {
		$output .= "<tr><td colspan='5' class='text-center'>No Record Found</td></tr>";
	}

	echo $output;
}


if(isset($_POST['action']) && $_POST['action'] == 'add_user') {

	$display_name = strip_tags(mysqli_real_escape_string($conn, $_POST['add_display_name']));
	$user_login = strip_tags(mysqli_real_escape_string($conn, $_POST['add_user_login']));
	$user_password = strip_tags(mysqli_real_escape_string($conn, $_POST['add_user_password']));
	$add_user_role = strip_tags(mysqli_real_escape_string($conn, $_POST['add_user_role']));

	if($add_user_role == '0') {
		$user_role = '0';
		$user_type = '0';
	} else if($add_user_role == '1') {
		$user_role = '0';
		$user_type = '1';
	} else if($add_user_role == '2') {
		$user_role = '1';
		$user_type = '1';
	}

	if($user_login != '' && $user_password != '' && $add_user_role != '') {
		if(mysqli_num_rows(mysqli_query($conn, "SELECT * FROM users WHERE user_login='$user_login' && delete_status='0'")) == 0) {
			$query = mysqli_query($conn, "INSERT INTO users(user_login, user_pass, display_name , role, type, time_created) VALUES('$user_login', '$user_password', '$display_name', '$user_role', '$user_type', '$time_created')");
			if($query) {
				echo 3;
			} else {
				echo 2;
			}
		} else {
			echo 1;
		}
	} else {
		echo 0;
	}
}


if(isset($_POST['action']) && $_POST['action'] == 'display_edit_user_form') {
	$id = strip_tags(mysqli_real_escape_string($conn, $_POST['id']));
	$output = '';

	if($id != '' && $id != 0) {
		$query = mysqli_query($conn, "SELECT * FROM users WHERE id='$id' && delete_status='0'");
		if(mysqli_num_rows($query) > 0) {
			$result = mysqli_fetch_assoc($query);
			if($result['active_status'] == 1) { $active_status='checked'; $inactive_status = ''; } else { $active_status=''; $inactive_status = 'checked'; }
			if($result['role'] == '0' && $result['type'] == '0') { $super_admin = 'selected'; } else { $super_admin = ''; }
			if($result['role'] == '0' && $result['type'] == '1') { $admin = 'selected'; } else { $admin = ''; }
			if($result['role'] == '1' && $result['type'] == '1') { $user = 'selected'; } else { $user = ''; }
			$output .= '<input type="hidden" value="edit_user" name="action">';
			$output .= '<input type="hidden" value="'.$result['id'].'" name="edit_user_id">';
			$output .= '<div class="mb-3">';
				$output .= '<label>Name:</label>';
				$output .= '<input type="text" class="form-control form-control-border" placeholder="Enter Name" id="edit_display_name" value="'.$result['display_name'].'" name="edit_display_name">';
			$output .= '</div>';
			$output .= '<div class="mb-3">';
				$output .= '<label>Username:</label>';
				$output .= '<input type="text" readonly class="form-control form-control-border" placeholder="Enter Username" id="edit_user_login" value="'.$result['user_login'].'" name="edit_user_login">';
			$output .= '</div>';
			$output .= '<div class="mb-3">';
				$output .= '<label>Password:</label>';
				$output .= '<input type="password" class="form-control form-control-border" placeholder="Enter Password" id="edit_user_password" value="'.$result['user_pass'].'" name="edit_user_password">';
			$output .= '</div>';
			$output .= '<div class="mb-3">';
				$output .= '<label>Role:</label>';
				$output .= "<select class='form-control' id='edit_user_role' name='edit_user_role'>";
				$output .= "<option value=''>Select Role</option>";
				$output .= "<option ".$super_admin." value='0'>Super Admin</option>";
				$output .= "<option ".$admin." value='1'>Admin</option>";
				$output .= "<option ".$user." value='2'>User</option>";
				$output .= "</select>";
			$output .= '</div>';
			$output .= '<fieldset class="form-group row">';
				$output .= '<legend class="col-form-label col-sm-2 float-sm-left pt-0">Status</legend>';
				$output .= '<div class="col-sm-10">';
					$output .= '<div class="form-check">';
						$output .= '<input class="form-check-input" type="radio" name="edit_user_status" id="active" value="1" '.$active_status.'>';
						$output .= '<label class="form-check-label" for="active">Active</label>';
					$output .= '</div>';
					$output .= '<div class="form-check">';
						$output .= '<input class="form-check-input" type="radio" name="edit_user_status" id="inactive" value="0" '.$inactive_status.'>';
						$output .= '<label class="form-check-label" for="inactive">Inactive</label>';
					$output .= '</div>';
				$output .= '</div>';
			$output .= '</fieldset>';
			$output .= '<button class="btn btn-primary" type="submit" name="edit_user_btn" id="edit_user_btn">Edit User</button>';
		}
	}

	echo $output;
}


if(isset($_POST['action']) && $_POST['action'] == 'edit_user') {
	$id = strip_tags(mysqli_real_escape_string($conn, $_POST['edit_user_id']));
	$display_name = strip_tags(mysqli_real_escape_string($conn, $_POST['edit_display_name']));
	$user_password = strip_tags(mysqli_real_escape_string($conn, $_POST['edit_user_password']));
	$edit_user_role = strip_tags(mysqli_real_escape_string($conn, $_POST['edit_user_role']));
	$active_status = strip_tags(mysqli_real_escape_string($conn, $_POST['edit_user_status']));
	if($edit_user_role == '0') {
		$user_role = '0';
		$user_type = '0';
	} else if($edit_user_role == '1') {
		$user_role = '0';
		$user_type = '1';
	} else if($edit_user_role == '2') {
		$user_role = '1';
		$user_type = '1';
	}

	if($user_password != '' && $edit_user_role != '') {
		if(is_superadmin() || is_admin()) {
			$query = mysqli_query($conn, "UPDATE users SET display_name='$display_name', user_pass='$user_password', role='$user_role', type='$user_type', active_status='$active_status' WHERE id='$id'");
			if($query) {
				echo 3;
			} else {
				echo 2;
			}
		}
	} else {
		echo 0;
	}
}


if(isset($_POST['action']) && $_POST['action'] == 'delete_user') {
	$id = strip_tags(mysqli_real_escape_string($conn, $_POST['id']));

	if($id != '' && $id != 0) {
		if(is_superadmin() || is_admin()) {
			$query = mysqli_query($conn, "UPDATE users SET delete_status='1' WHERE id='$id'");
			if($query) {
				echo 2;
			} else {
				echo 1;
			}
		}
	} else {
		echo 0;
	}
}





// ******************************** Assets ****************************************


if(isset($_POST['action']) && $_POST['action'] == 'new_purchase') {

	$igr_number = strtoupper(strip_tags(mysqli_real_escape_string($conn, $_POST['igr_number'])));
	$igr_date = strtoupper(strip_tags(mysqli_real_escape_string($conn, $_POST['igr_date'])));
	$item_name = strtoupper(strip_tags(mysqli_real_escape_string($conn, $_POST['item_name'])));
	$asset_type = strtoupper(strip_tags(mysqli_real_escape_string($conn, $_POST['asset_type'])));

	if($igr_number != '' && $igr_date != '' && $item_name != '' && $asset_type != '') {

		if($asset_type == 1) {

			$brand_name = strtoupper(mysqli_real_escape_string($conn, $_POST['brand_name']));
			$serial_number = strtoupper(strip_tags(mysqli_real_escape_string($conn, $_POST['serial_number'])));
			$model_number = strtoupper(strip_tags(mysqli_real_escape_string($conn, $_POST['model_number'])));
			$processor_detail = strtoupper(strip_tags(mysqli_real_escape_string($conn, $_POST['processor_detail'])));
			$power_supply = strtoupper(strip_tags(mysqli_real_escape_string($conn, $_POST['power_supply'])));

			if($brand_name != '' && $serial_number != '' && $model_number != '' && $processor_detail != '' && $power_supply != '') {

				$query = mysqli_query($conn, "INSERT INTO assets(user_id, igr_number, igr_date, asset_name, asset_type, qty, time_created) VALUES('$user_id', '$igr_number', '$igr_date', '$item_name', '$asset_type', '1', '$time_created')");
				$asset_id = mysqli_insert_id($conn);
				$meta_query = mysqli_query($conn, "INSERT INTO asset_meta(asset_id, meta_key, meta_value) VALUES('$asset_id', 'brand_name', '$brand_name'), ('$asset_id', 'serial_number', '$serial_number'), ('$asset_id', 'model_number', '$model_number'), ('$asset_id', 'processor_detail', '$processor_detail'), ('$asset_id', 'power_supply', '$power_supply')");

				$total_ram = sizeof($_POST['ram_type']);

				for($i = 0; $i < sizeof($_POST['ram_size']); $i++) {

					if($_POST['ram_type'][$i] != '' && $_POST['ram_size'][$i] != '' && $_POST['ram_qty'][$i] != '') {

						$ram_type = 'ram_type_'.$i;
						$ram_size = 'ram_size_'.$i;
						$ram_qty = 'ram_qty_'.$i;

						$ram_query = mysqli_query($conn, "INSERT INTO assets(user_id, igr_number, igr_date, asset_name, asset_type, asset_category, item_type, item_size, qty, parent_id, time_created) VALUES('$user_id', '$igr_number', '$igr_date', 'RAM', '2', '19', '{$_POST['ram_type'][$i]}', '{$_POST['ram_size'][$i]}', '{$_POST['ram_qty'][$i]}', '$asset_id', '$time_created')");

					}

				}

				$total_rom = sizeof($_POST['rom_type']);

				for($i = 0; $i < sizeof($_POST['rom_size']); $i++) {

					if($_POST['rom_type'][$i] != '' && $_POST['rom_size'][$i] != '' && $_POST['rom_qty'][$i] != '') {

						$rom_type = 'rom_type_'.$i;
						$rom_size = 'rom_size_'.$i;
						$rom_qty = 'rom_qty_'.$i;

						$rom_query = mysqli_query($conn, "INSERT INTO assets(user_id, igr_number, igr_date, asset_name, asset_type, asset_category, item_type, item_size, qty, parent_id, time_created) VALUES('$user_id', '$igr_number', '$igr_date', 'ROM', '2', '20', '{$_POST['rom_type'][$i]}', '{$_POST['rom_size'][$i]}', '{$_POST['rom_qty'][$i]}', '$asset_id', '$time_created')");

					}

				}


				if(isset($_POST['cable_detail']) && $_POST['cable_detail'] == 1) {

					// $cable_total = sizeof($_POST['cable_type']);

					for($i = 0; $i < sizeof($_POST['cable_type']); $i++) {

						$cable_query = mysqli_query($conn, "INSERT INTO assets(user_id, igr_number, igr_date, asset_name, asset_type, asset_category, item_type, qty, time_created) VALUES('$user_id', '$igr_number', '$igr_date', 'CABLE', '2', '5', '{$_POST['cable_type'][$i]}', '{$_POST['cable_qty'][$i]}', '$time_created')");

					}

				}


				if(isset($_POST['computer_screen_detail']) && $_POST['computer_screen_detail'] == 1) {

					// $screen_total = sizeof($_POST['screen_brand_name']);

					for($i = 0; $i < sizeof($_POST['screen_brand_name']); $i++) {
						$screen_brand_name = strtoupper($_POST['screen_brand_name'][$i]);
						$screen_serial_number = strtoupper($_POST['screen_serial_number'][$i]);
						$screen_model_number = strtoupper($_POST['screen_model_number'][$i]);

						$screen_query = mysqli_query($conn, "INSERT INTO assets(user_id, igr_number, igr_date, asset_name, asset_type, asset_category, item_size, qty, time_created) VALUES('$user_id', '$igr_number', '$igr_date', 'LED', '2', '4', '{$_POST['screen_dimension'][$i]}', '1', '$time_created')");
						$screen_id = mysqli_insert_id($conn);
						$screen_meta_query = mysqli_query($conn, "INSERT INTO asset_meta(asset_id, meta_key, meta_value) VALUES('$screen_id', 'brand_name', '$screen_brand_name'), ('$screen_id', 'serial_number', '$screen_serial_number'), ('$screen_id', 'model_number', '$screen_model_number')");

					}

				}


				if(isset($_POST['keyboard_detail']) && $_POST['keyboard_detail'] == 1) {

					$keyboard_brand_name = strtoupper($_POST['keyboard_brand_name'][$i]);
					$keyboard_serial_number = strtoupper($_POST['keyboard_serial_number'][$i]);
					$keyboard_model_number = strtoupper($_POST['keyboard_model_number'][$i]);

					$query = mysqli_query($conn, "INSERT INTO assets(user_id, igr_number, igr_date, asset_name, asset_type, asset_category, item_type, qty, time_created) VALUES('$user_id', '$igr_number', '$igr_date', 'Keyboard', '2', '6', '{$_POST['keyboard_item_type']}', '{$_POST['keyboard_purchased_quantity']}', '$time_created')");
					$keyboard_id = mysqli_insert_id($conn);
					$meta_query = mysqli_query($conn, "INSERT INTO asset_meta(asset_id, meta_key, meta_value) VALUES('$keyboard_id', 'brand_name', '$keyboard_brand_name'), ('$keyboard_id', 'serial_number', '$keyboard_serial_number'), ('$keyboard_id', 'model_number', '$keyboard_model_number')");

				}


				if(isset($_POST['mouse_detail']) && $_POST['mouse_detail'] == 1) {

					$mouse_brand_name = strtoupper($_POST['mouse_brand_name'][$i]);
					$mouse_serial_number = strtoupper($_POST['mouse_serial_number'][$i]);
					$mouse_model_number = strtoupper($_POST['mouse_model_number'][$i]);

					$query = mysqli_query($conn, "INSERT INTO assets(user_id, igr_number, igr_date, asset_name, asset_type, asset_category, item_type, qty, time_created) VALUES('$user_id', '$igr_number', '$igr_date', 'MOUSE', '2', '7', '{$_POST['mouse_item_type']}', '{$_POST['mouse_purchased_quantity']}', '$time_created')");
					$mouse_id = mysqli_insert_id($conn);
					$meta_query = mysqli_query($conn, "INSERT INTO asset_meta(asset_id, meta_key, meta_value) VALUES('$mouse_id', 'brand_name', '$mouse_brand_name'), ('$mouse_id', 'serial_number', '$mouse_serial_number'), ('$mouse_id', 'model_number', '$mouse_model_number')");

				}



				if($query && $meta_query) {
					echo 2;
				} else {
					echo 1;
				}

			}

		} else if($asset_type == 2) {

			$asset_category = strtoupper(strip_tags(mysqli_real_escape_string($conn, $_POST['asset_category'])));

			if($asset_category == 1) {

				$brand_name = strtoupper(strip_tags(mysqli_real_escape_string($conn, $_POST['brand_name'])));
				$serial_number = strtoupper(strip_tags(mysqli_real_escape_string($conn, $_POST['serial_number'])));
				$model_number = strtoupper(strip_tags(mysqli_real_escape_string($conn, $_POST['model_number'])));
				$purchased_quantity = strip_tags(mysqli_real_escape_string($conn, $_POST['purchased_quantity']));

				if($brand_name != '' && $serial_number != '' && $model_number != '' && $purchased_quantity != '') {

					$query = mysqli_query($conn, "INSERT INTO assets(user_id, igr_number, igr_date, asset_name, asset_type, asset_category, qty, time_created) VALUES('$user_id', '$igr_number', '$igr_date', '$item_name', '$asset_type', '$asset_category', '$purchased_quantity', '$time_created')");
					$asset_id = mysqli_insert_id($conn);
					$meta_query = mysqli_query($conn, "INSERT INTO asset_meta(asset_id, meta_key, meta_value) VALUES('$asset_id', 'brand_name', '$brand_name'), ('$asset_id', 'serial_number', '$serial_number'), ('$asset_id', 'model_number', '$model_number')");

					$tonor_query = mysqli_query($conn, "INSERT INTO assets(user_id, igr_number, igr_date, asset_name, asset_type, asset_category, qty, parent_id, time_created) VALUES('$user_id', '$igr_number', '$igr_date', 'TONOR', '2', '2', '$purchased_quantity', '$asset_id', '$time_created')");
					$tonor_id = mysqli_insert_id($conn);
					$meta_query = mysqli_query($conn, "INSERT INTO asset_meta(asset_id, meta_key, meta_value) VALUES('$tonor_id', 'brand_name', '$brand_name'), ('$tonor_id', 'serial_number', '$serial_number'), ('$tonor_id', 'model_number', '$model_number')");


					if(isset($_POST['cable_detail']) && $_POST['cable_detail'] == 1) {

						for($i = 0; $i < sizeof($_POST['cable_type']); $i++) {

							$cable_query = mysqli_query($conn, "INSERT INTO assets(user_id, igr_number, igr_date, asset_name, asset_type, asset_category, item_type, qty, time_created) VALUES('$user_id', '$igr_number', '$igr_date', 'CABLE', '2', '5', '{$_POST['cable_type'][$i]}', '{$_POST['cable_qty'][$i]}', '$time_created')");

						}

					}


					if($query && $meta_query && $tonor_query && $meta_query) {
						echo 2;
					} else {
						echo 1;
					}

				} else {
					echo 0;
				}

			} else if($asset_category == 2 || $asset_category == 3 || $asset_category == 13) {

				$brand_name = strtoupper(strip_tags(mysqli_real_escape_string($conn, $_POST['brand_name'])));
				$serial_number = strtoupper(strip_tags(mysqli_real_escape_string($conn, $_POST['serial_number'])));
				$model_number = strtoupper(strip_tags(mysqli_real_escape_string($conn, $_POST['model_number'])));
				$purchased_quantity = strip_tags(mysqli_real_escape_string($conn, $_POST['purchased_quantity']));

				if($brand_name != '' && $serial_number != '' && $model_number != '' && $purchased_quantity != '') {

					$query = mysqli_query($conn, "INSERT INTO assets(user_id, igr_number, igr_date, asset_name, asset_type, asset_category, qty, time_created) VALUES('$user_id', '$igr_number', '$igr_date', '$item_name', '$asset_type', '$asset_category', '$purchased_quantity', '$time_created')");
					$asset_id = mysqli_insert_id($conn);
					$meta_query = mysqli_query($conn, "INSERT INTO asset_meta(asset_id, meta_key, meta_value) VALUES('$asset_id', 'brand_name', '$brand_name'), ('$asset_id', 'serial_number', '$serial_number'), ('$asset_id', 'model_number', '$model_number')");

					if($query && $meta_query) {
						echo 2;
					} else {
						echo 1;
					}

				} else {
					echo 0;
				}

			} else if($asset_category == 4) {

				$brand_name = strtoupper(strip_tags(mysqli_real_escape_string($conn, $_POST['brand_name'])));
				$serial_number = strtoupper(strip_tags(mysqli_real_escape_string($conn, $_POST['serial_number'])));
				$model_number = strtoupper(strip_tags(mysqli_real_escape_string($conn, $_POST['model_number'])));
				$screen_dimension = strtoupper(strip_tags(mysqli_real_escape_string($conn, $_POST['screen_dimension'])));
				$purchased_quantity = strip_tags(mysqli_real_escape_string($conn, $_POST['purchased_quantity']));

				if($brand_name != '' && $serial_number != '' && $model_number != '' && $purchased_quantity != '') {

					$query = mysqli_query($conn, "INSERT INTO assets(user_id, igr_number, igr_date, asset_name, asset_type, asset_category, item_size, qty, time_created) VALUES('$user_id', '$igr_number', '$igr_date', '$item_name', '$asset_type', '$asset_category', '$screen_dimension', '$purchased_quantity', '$time_created')");
					$asset_id = mysqli_insert_id($conn);
					$meta_query = mysqli_query($conn, "INSERT INTO asset_meta(asset_id, meta_key, meta_value) VALUES('$asset_id', 'brand_name', '$brand_name'), ('$asset_id', 'serial_number', '$serial_number'), ('$asset_id', 'model_number', '$model_number')");


					if(isset($_POST['cable_detail']) && $_POST['cable_detail'] == 1) {

						// $cable_total = sizeof($_POST['cable_type']);

						for($i = 0; $i < sizeof($_POST['cable_type']); $i++) {

							$cable_query = mysqli_query($conn, "INSERT INTO assets(user_id, igr_number, igr_date, asset_name, asset_type, asset_category, item_type, qty, time_created) VALUES('$user_id', '$igr_number', '$igr_date', 'CABLE', '2', '5', '{$_POST['cable_type'][$i]}', '{$_POST['cable_qty'][$i]}', '$time_created')");

						}

					}
					

					if($query && $meta_query) {
						echo 2;
					} else {
						echo 1;
					}

				} else {
					echo 0;
				}

			} else if($asset_category == 5) {

				$cable_type = strip_tags(mysqli_real_escape_string($conn, $_POST['item_type']));
				$purchased_quantity = strip_tags(mysqli_real_escape_string($conn, $_POST['purchased_quantity']));

				if($cable_type != '' && $purchased_quantity != '') {

					$query = mysqli_query($conn, "INSERT INTO assets(user_id, igr_number, igr_date, asset_name, asset_type, asset_category, item_type, qty, time_created) VALUES('$user_id', '$igr_number', '$igr_date', '$item_name', '$asset_type', '$asset_category', '$cable_type', '$purchased_quantity', '$time_created')");

					if($query) {
						echo 2;
					} else {
						echo 1;
					}

				} else {
					echo 0;
				}

			} else if($asset_category == 6 || $asset_category == 7 || $asset_category == 8 || $asset_category == 9 || $asset_category == 10 || $asset_category == 11 || $asset_category == 12) {

				$brand_name = strtoupper(strip_tags(mysqli_real_escape_string($conn, $_POST['brand_name'])));
				$serial_number = strtoupper(strip_tags(mysqli_real_escape_string($conn, $_POST['serial_number'])));
				$model_number = strtoupper(strip_tags(mysqli_real_escape_string($conn, $_POST['model_number'])));
				$item_type = strtoupper(strip_tags(mysqli_real_escape_string($conn, $_POST['item_type'])));
				$purchased_quantity = strip_tags(mysqli_real_escape_string($conn, $_POST['purchased_quantity']));

				if($brand_name != '' && $serial_number != '' && $model_number != '' && $purchased_quantity != '') {

					$query = mysqli_query($conn, "INSERT INTO assets(user_id, igr_number, igr_date, asset_name, asset_type, asset_category, item_type, qty, time_created) VALUES('$user_id', '$igr_number', '$igr_date', '$item_name', '$asset_type', '$asset_category', '$item_type', '$purchased_quantity', '$time_created')");
					$asset_id = mysqli_insert_id($conn);
					$meta_query = mysqli_query($conn, "INSERT INTO asset_meta(asset_id, meta_key, meta_value) VALUES('$asset_id', 'brand_name', '$brand_name'), ('$asset_id', 'serial_number', '$serial_number'), ('$asset_id', 'model_number', '$model_number')");

					if($query && $meta_query) {
						echo 2;
					} else {
						echo 1;
					}

				} else {
					echo 0;
				}

			} else if($asset_category == 14 || $asset_category == 15 || $asset_category == 16 || $asset_category == 17 || $asset_category == 18) {

				$purchased_quantity = strip_tags(mysqli_real_escape_string($conn, $_POST['purchased_quantity']));

				if($purchased_quantity != '') {

					$query = mysqli_query($conn, "INSERT INTO assets(user_id, igr_number, igr_date, asset_name, asset_type, asset_category, qty, time_created) VALUES('$user_id', '$igr_number', '$igr_date', '$item_name', '$asset_type', '$asset_category', '$purchased_quantity', '$time_created')");

					if($query) {
						echo 2;
					} else {
						echo 1;
					}

				} else {
					echo 0;
				}

			} else if($asset_category == 19 || $asset_category == 20) {

				$brand_name = strtoupper(strip_tags(mysqli_real_escape_string($conn, $_POST['brand_name'])));
				$serial_number = strtoupper(strip_tags(mysqli_real_escape_string($conn, $_POST['serial_number'])));
				$model_number = strtoupper(strip_tags(mysqli_real_escape_string($conn, $_POST['model_number'])));
				$item_type = strtoupper(strip_tags(mysqli_real_escape_string($conn, $_POST['item_type'])));
				$item_size = strtoupper(strip_tags(mysqli_real_escape_string($conn, $_POST['item_size'])));
				$purchased_quantity = strip_tags(mysqli_real_escape_string($conn, $_POST['purchased_quantity']));

				if($brand_name != '' && $serial_number != '' && $model_number != '' && $purchased_quantity != '') {

					$query = mysqli_query($conn, "INSERT INTO assets(user_id, igr_number, igr_date, asset_name, asset_type, asset_category, item_type, item_size, qty, time_created) VALUES('$user_id', '$igr_number', '$igr_date', '$item_name', '$asset_type', '$asset_category', '$item_type', '$item_size', '$purchased_quantity', '$time_created')");
					$asset_id = mysqli_insert_id($conn);
					$meta_query = mysqli_query($conn, "INSERT INTO asset_meta(asset_id, meta_key, meta_value) VALUES('$asset_id', 'brand_name', '$brand_name'), ('$asset_id', 'serial_number', '$serial_number'), ('$asset_id', 'model_number', '$model_number')");

					if($query && $meta_query) {
						echo 2;
					} else {
						echo 1;
					}

				} else {
					echo 0;
				}

			}

		}

	} else {
		echo 0;
	}

}


if(isset($_GET['action']) && $_GET['action'] == 'display_assets') {

	$output = '';

	// $asset_display_type = strip_tags(mysqli_real_escape_string($conn, $_GET['asset_type']));

	// if($asset_display_type == 'all') {

		$query = mysqli_query($conn, "SELECT * FROM assets WHERE active_status='1' && delete_status='0' && parent_id is NULL");

		if(mysqli_num_rows($query) > 0) {

			$i = 1;
			while($result = mysqli_fetch_assoc($query)) {

				$output .= "<tr>";
				$output .= "<td>".$result['igr_number']."</td>";
				$output .= "<td>".$result['asset_name']."</td>";
				if($result['asset_type'] == 2) {
					if($result['asset_category'] == 14 || $result['asset_category'] == 15 || $result['asset_category'] == 16 || $result['asset_category'] == 17) {
						$output .= "<td></td><td></td><td></td>";
					} else {
						$output .= "<td>".asset_meta($result['id'], 'brand_name')."</td>";
						$output .= "<td>".asset_meta($result['id'], 'serial_number')."</td>";
						$output .= "<td>".asset_meta($result['id'], 'model_number')."</td>";
					}
				} else {
					$output .= "<td>".asset_meta($result['id'], 'brand_name')."</td>";
					$output .= "<td>".asset_meta($result['id'], 'serial_number')."</td>";
					$output .= "<td>".asset_meta($result['id'], 'model_number')."</td>";
				}
				$output .= "<td>";
				if($result['asset_type'] == 2) {
					if($result['asset_category'] == 5 || $result['asset_category'] == 6 || $result['asset_category'] == 7 || $result['asset_category'] == 8 || $result['asset_category'] == 9) {
						$output .= $result['item_type'];
					} else if($result['asset_category'] == 10 || $result['asset_category'] == 11 || $result['asset_category'] == 12) {
						$output .= $result['item_type']." Ports";
					} else if($result['asset_category'] == 19) {
						$output .= "DDR".$result['item_type'];
					} else if($result['asset_category'] == 20) {
						$output .= $result['item_type'];
					}
				}
				$output .= "</td>";
				$output .= "<td>";
				if($result['asset_type'] == 2) {
					if($result['asset_category'] == 4) {
						$output .= $result['item_size'].'"';
					} else if($result['asset_category'] == 19 || $result['asset_category'] == 20) {
						$output .= $result['item_size']."GB";
					}
				}
				$output .= "</td>";
				$output .= "<td>";
				if($result['asset_type'] == 1) {
					$output .= "Computer";
				} else if($result['asset_type'] == 2) {
					if($result['asset_category'] == 1) {
						$output .= "Printer";
					} else if($result['asset_category'] == 2) {
						$output .= "Tonor";
					} else if($result['asset_category'] == 3) {
						$output .= "Scanner";
					} else if($result['asset_category'] == 4) {
						$output .= "Computer Screen";
					} else if($result['asset_category'] == 5) {
						$output .= "Cable";
					} else if($result['asset_category'] == 6) {
						$output .= "Keyboard";
					} else if($result['asset_category'] == 7) {
						$output .= "Mouse";
					} else if($result['asset_category'] == 8) {
						$output .= "Speaker";
					} else if($result['asset_category'] == 9) {
						$output .= "Microphone";
					} else if($result['asset_category'] == 10) {
						$output .= "Network Switch";
					} else if($result['asset_category'] == 11) {
						$output .= "Network HUB";
					} else if($result['asset_category'] == 12) {
						$output .= "Network Router";
					} else if($result['asset_category'] == 13) {
						$output .= "Media Converter";
					} else if($result['asset_category'] == 14) {
						$output .= "Extension";
					} else if($result['asset_category'] == 15) {
						$output .= "Tools";
					} else if($result['asset_category'] == 16) {
						$output .= "Ethernet Connector";
					} else if($result['asset_category'] == 17) {
						$output .= "Tie";
					} else if($result['asset_category'] == 18) {
						$output .= "Network Cable";
					} else if($result['asset_category'] == 19) {
						$output .= "RAM";
					} else if($result['asset_category'] == 20) {
						$output .= "ROM";
					}
				}
				$output .= "</td>";
				$output .= "<td>";
				if($result['asset_type'] == 2) {
					if($result['asset_category'] == 18) {
						$output .= $result['qty']." Feet";
					} else {
						$output .= $result['qty'];
					}
				} else {
					$output .= $result['qty'];
				}
				$output .= "</td>";
				$output .= "<td><div class='btn-group'>";
				// $output .= "<a class='btn btn-success btn-sm'><i class='fas fa-eye'></i></a>";
				if(mysqli_num_rows(mysqli_query($conn, "SELECT * FROM deploy_assets WHERE asset_id='{$result['id']}' && active_status='1' && delete_status='0'")) == 0) {
					if(is_superadmin() || is_admin()) {
						$output .= "<a href='asset-edit.php?id=".$result['id']."' class='btn btn-primary btn-sm'><i class='fas fa-edit'></i></a>";
						$output .= "<a class='btn btn-danger btn-sm asset_delete_btn' data-id='".$result['id']."'><i class='fas fa-trash'></i></a>";
					}
				}
				$output .= "</div></td>";
				$output .= "</tr>";

			}

		} else {
			$output .= "<tr><td colspan='9' class='text-center'>No Record Found</td></tr>";
		}
		
	// }

	echo $output;

}

if(isset($_POST['action']) && $_POST['action'] == 'previous_ram_type') {
	$id = strip_tags(mysqli_real_escape_string($conn, $_POST['id']));
	$ram_type = strip_tags(mysqli_real_escape_string($conn, $_POST['previous_ram_type']));

	if($id != '' && $id != 0 && $ram_type != '' && $ram_type != 0) {
		if(is_superadmin() || is_admin()) {
			$query = mysqli_query($conn, "UPDATE assets SET item_type='$ram_type' WHERE id='$id'");

			if($query) {
				echo 2;
			} else {
				echo 1;
			}
		}
	} else {
		echo 0;
	}
}


if(isset($_POST['action']) && $_POST['action'] == 'previous_ram_size') {
	$id = strip_tags(mysqli_real_escape_string($conn, $_POST['id']));
	$ram_size = strip_tags(mysqli_real_escape_string($conn, $_POST['previous_ram_size']));

	if($id != '' && $id != 0 && $ram_size != '' && $ram_size != 0) {
		if(is_superadmin() || is_admin()) {
			$query = mysqli_query($conn, "UPDATE assets SET item_size='$ram_size' WHERE id='$id'");

			if($query) {
				echo 2;
			} else {
				echo 1;
			}
		}
	} else {
		echo 0;
	}
}

if(isset($_POST['action']) && $_POST['action'] == 'previous_ram_qty') {
	$id = strip_tags(mysqli_real_escape_string($conn, $_POST['id']));
	$ram_qty = strip_tags(mysqli_real_escape_string($conn, $_POST['previous_ram_qty']));

	if($id != '' && $id != 0 && $ram_qty != '' && $ram_qty != 0) {
		if(is_superadmin() || is_admin()) {
			$query = mysqli_query($conn, "UPDATE assets SET item_qty='$ram_qty' WHERE id='$id'");

			if($query) {
				echo 2;
			} else {
				echo 1;
			}
		}
	} else {
		echo 0;
	}
}


if(isset($_POST['action']) && $_POST['action'] == 'delete_assets') {
	$id = strip_tags(mysqli_real_escape_string($conn, $_POST['id']));

	if($id != '' && $id != 0) {
		if(is_superadmin() || is_admin()) {
			$query = mysqli_query($conn, "DELETE FROM assets WHERE id='$id'");
			$meta = mysqli_query($conn, "DELETE FROM asset_meta WHERE asset_id='$id'");

			$check_accessories = mysqli_query($conn, "SELECT * FROM assets WHERE parent_id='$id'");

			if(mysqli_num_rows($check_accessories) > 0) {

				while($result = mysqli_fetch_assoc($check_accessories)) {
					$accessories_query = mysqli_query($conn, "DELETE FROM assets WHERE id='{$result['id']}'");
					$accessories_meta = mysqli_query($conn, "DELETE FROM asset_meta WHERE asset_id='{$result['id']}'");
				}

			}

			if($query && $meta) {
				echo 2;
			} else {
				echo 1;
			}
		}
	}
}


if(isset($_POST['action']) && $_POST['action'] == 'edit_asset') {

	$id = strtoupper(strip_tags(mysqli_real_escape_string($conn, $_POST['id'])));
	$igr_number = strtoupper(strip_tags(mysqli_real_escape_string($conn, $_POST['igr_number'])));
	$igr_date = strtoupper(strip_tags(mysqli_real_escape_string($conn, $_POST['igr_date'])));
	$item_name = strtoupper(strip_tags(mysqli_real_escape_string($conn, $_POST['item_name'])));
	$asset_type = strtoupper(strip_tags(mysqli_real_escape_string($conn, $_POST['asset_type'])));
	$asset_category = strtoupper(strip_tags(mysqli_real_escape_string($conn, $_POST['asset_category'])));

	if($item_name != '') {

		if(is_superadmin() || is_admin()) {
			if($asset_type == 1) {
				
				$asset_name = strtoupper(strip_tags(mysqli_real_escape_string($conn, $_POST['item_name'])));
				$brand_name = strtoupper(strip_tags(mysqli_real_escape_string($conn, $_POST['brand_name'])));
				$serial_number = strtoupper(strip_tags(mysqli_real_escape_string($conn, $_POST['serial_number'])));
				$model_number = strtoupper(strip_tags(mysqli_real_escape_string($conn, $_POST['model_number'])));
				$processor_detail = strtoupper(strip_tags(mysqli_real_escape_string($conn, $_POST['processor_detail'])));
				$power_supply = strtoupper(strip_tags(mysqli_real_escape_string($conn, $_POST['power_supply'])));

				if($item_name != '' && $brand_name != '' && $serial_number != '' && $model_number != '' && $processor_detail != '' && $power_supply != '') {
					$query = mysqli_query($conn, "UPDATE assets SET asset_name='$item_name' WHERE id='$id'");
					$update_brand_name = update_asset_meta($id, 'brand_name', $brand_name);
					$update_serial_number = update_asset_meta($id, 'serial_number', $serial_number);
					$update_model_number = update_asset_meta($id, 'model_number', $model_number);
					$update_processor_detail = update_asset_meta($id, 'processor_detail', $processor_detail);
					$update_power_supply = update_asset_meta($id, 'power_supply', $power_supply);

					$total_ram = sizeof($_POST['ram_type']);

					for($i = 0; $i < sizeof($_POST['ram_size']); $i++) {

						if($_POST['ram_type'][$i] != '' && $_POST['ram_size'][$i] != '' && $_POST['ram_qty'][$i] != '') {

							$ram_type = 'ram_type_'.$i;
							$ram_size = 'ram_size_'.$i;
							$ram_qty = 'ram_qty_'.$i;

							$ram_query = mysqli_query($conn, "INSERT INTO assets(igr_number, igr_date, asset_name, asset_type, asset_category, item_type, item_size, qty, parent_id, time_created) VALUES('$igr_number', '$igr_date', 'RAM', '2', '19', '{$_POST['ram_type'][$i]}', '{$_POST['ram_size'][$i]}', '{$_POST['ram_qty'][$i]}', '$id', '$time_created')");

						}

					}

					$total_rom = sizeof($_POST['rom_type']);

					for($i = 0; $i < sizeof($_POST['rom_size']); $i++) {

						if($_POST['rom_type'][$i] != '' && $_POST['rom_size'][$i] != '' && $_POST['rom_qty'][$i] != '') {

							$rom_type = 'rom_type_'.$i;
							$rom_size = 'rom_size_'.$i;
							$rom_qty = 'rom_qty_'.$i;

							$rom_query = mysqli_query($conn, "INSERT INTO assets(igr_number, igr_date, asset_name, asset_type, asset_category, item_type, item_size, qty, parent_id, time_created) VALUES('$igr_number', '$igr_date', 'ROM', '2', '20', '{$_POST['rom_type'][$i]}', '{$_POST['rom_size'][$i]}', '{$_POST['rom_qty'][$i]}', '$id', '$time_created')");

						}

					}

					if($query && $update_brand_name && $update_serial_number && $update_model_number && $update_processor_detail && $update_power_supply) {
						echo 2;
					} else {
						echo 1;
					}

				} else {
					echo 0;
				}

			} else if($asset_type == 2) {

				$purchased_quantity = strip_tags(mysqli_real_escape_string($conn, $_POST['purchased_quantity']));

				if($asset_category == 1 || $asset_category == 2 || $asset_category == 3 || $asset_category == 4 || $asset_category == 6 || $asset_category == 7 || $asset_category == 8 || $asset_category == 9 || $asset_category == 10 || $asset_category == 11 || $asset_category == 12 || $asset_category == 13 || $asset_category == 19 || $asset_category == 20) {
					$brand_name = strtoupper(strip_tags(mysqli_real_escape_string($conn, $_POST['brand_name'])));
					$serial_number = strtoupper(strip_tags(mysqli_real_escape_string($conn, $_POST['serial_number'])));
					$model_number = strtoupper(strip_tags(mysqli_real_escape_string($conn, $_POST['model_number'])));
				}

				if($asset_category == 1) {

					$update_brand_name = update_asset_meta($id, 'brand_name', $brand_name);
					$update_serial_number = update_asset_meta($id, 'serial_number', $serial_number);
					$update_model_number = update_asset_meta($id, 'model_number', $model_number);
					$query = mysqli_query($conn, "UPDATE assets SET qty='$purchased_quantity' WHERE id='$id'");
					$update_tonor = mysqli_query($conn, "UPDATE assets SET qty='$purchased_quantity' WHERE parent_id='$id' && asset_type='2' && asset_category='2'");

					if($update_brand_name && $update_serial_number && $update_model_number && $query && $tonor_query) {
						echo 2;
					} else {
						echo 1;
					}

				} else if($asset_category == 2 || $asset_category == 3 || $asset_category == 13) {
					
					$update_brand_name = update_asset_meta($id, 'brand_name', $brand_name);
					$update_serial_number = update_asset_meta($id, 'serial_number', $serial_number);
					$update_model_number = update_asset_meta($id, 'model_number', $model_number);
					$query = mysqli_query($conn, "UPDATE assets SET qty='$purchased_quantity' WHERE id='$id'");

					if($update_brand_name && $update_serial_number && $update_model_number && $query) {
						echo 2;
					} else {
						echo 1;
					}
				
				} else if($asset_category == 4) {

					$item_size = strtoupper(strip_tags(mysqli_real_escape_string($conn, $_POST['item_size'])));

					$update_brand_name = update_asset_meta($id, 'brand_name', $brand_name);
					$update_serial_number = update_asset_meta($id, 'serial_number', $serial_number);
					$update_model_number = update_asset_meta($id, 'model_number', $model_number);
					$query = mysqli_query($conn, "UPDATE assets SET qty='$purchased_quantity', item_size='$item_size' WHERE id='$id'");

					if($update_brand_name && $update_serial_number && $update_model_number && $query) {
						echo 2;
					} else {
						echo 1;
					}

				} else if($asset_category == 5 || $asset_category == 14 || $asset_category == 15 || $asset_category == 16 || $asset_category == 17 || $asset_category == 18) {

					$query = mysqli_query($conn, "UPDATE assets SET qty='$purchased_quantity' WHERE id='$id'");

					if($query) {
						echo 2;
					} else {
						echo 1;
					}

				} else if($asset_category == 6 || $asset_category == 7 || $asset_category == 8 || $asset_category == 9 || $asset_category == 10 || $asset_category == 11 || $asset_category == 12) {
					$item_type = strtoupper(strip_tags(mysqli_real_escape_string($conn, $_POST['item_type'])));

					$update_brand_name = update_asset_meta($id, 'brand_name', $brand_name);
					$update_serial_number = update_asset_meta($id, 'serial_number', $serial_number);
					$update_model_number = update_asset_meta($id, 'model_number', $model_number);

					$query = mysqli_query($conn, "UPDATE assets SET qty='$purchased_quantity', item_type='$item_type' WHERE id='$id'");

					if($update_brand_name && $update_serial_number && $update_model_number && $query) {
						echo 2;
					} else {
						echo 1;
					}

				} else if($asset_category == 19 || $asset_category == 20) {

					$item_type = strtoupper(strip_tags(mysqli_real_escape_string($conn, $_POST['item_type'])));
					$item_size = strtoupper(strip_tags(mysqli_real_escape_string($conn, $_POST['item_size'])));

					$update_brand_name = update_asset_meta($id, 'brand_name', $brand_name);
					$update_serial_number = update_asset_meta($id, 'serial_number', $serial_number);
					$update_model_number = update_asset_meta($id, 'model_number', $model_number);

					$query = mysqli_query($conn, "UPDATE assets SET qty='$purchased_quantity', item_type='$item_type', item_size='$item_size' WHERE id='$id'");

					if($update_brand_name && $update_serial_number && $update_model_number && $query) {
						echo 2;
					} else {
						echo 1;
					}

				}

			}
		}

	} else {
		echo 0;
	}

}


if(isset($_POST['action']) && $_POST['action'] == 'display_ready_to_deploy_assets') {

	$output = '';

	$asset_display_type = strip_tags(mysqli_real_escape_string($conn, $_POST['asset_type']));

	if($asset_display_type == 'all') {

		$query = mysqli_query($conn, "SELECT * FROM assets WHERE qty!='0' && active_status='1' && delete_status='0' && parent_id is NULL");

		if(mysqli_num_rows($query) > 0) {

			$i = 1;
			while($result = mysqli_fetch_assoc($query)) {

				$output .= "<tr>";
				$output .= "<td>".$result['igr_number']."</td>";
				$output .= "<td>".$result['asset_name']."</td>";
				if($result['asset_type'] == 2) {
					if($result['asset_category'] == 14 || $result['asset_category'] == 15 || $result['asset_category'] == 16 || $result['asset_category'] == 17) {
						$output .= "<td></td><td></td><td></td>";
					} else {
						$output .= "<td>".asset_meta($result['id'], 'brand_name')."</td>";
						$output .= "<td>".asset_meta($result['id'], 'serial_number')."</td>";
						$output .= "<td>".asset_meta($result['id'], 'model_number')."</td>";
					}
				} else {
					$output .= "<td>".asset_meta($result['id'], 'brand_name')."</td>";
					$output .= "<td>".asset_meta($result['id'], 'serial_number')."</td>";
					$output .= "<td>".asset_meta($result['id'], 'model_number')."</td>";
				}
				$output .= "<td>";
				if($result['asset_type'] == 2) {
					if($result['asset_category'] == 5 || $result['asset_category'] == 6 || $result['asset_category'] == 7 || $result['asset_category'] == 8 || $result['asset_category'] == 9) {
						$output .= $result['item_type'];
					} else if($result['asset_category'] == 10 || $result['asset_category'] == 11 || $result['asset_category'] == 12) {
						$output .= $result['item_type']." Ports";
					} else if($result['asset_category'] == 19) {
						$output .= "DDR".$result['item_type'];
					} else if($result['asset_category'] == 20) {
						$output .= $result['item_type'];
					}
				}
				$output .= "</td>";
				$output .= "<td>";
				if($result['asset_type'] == 2) {
					if($result['asset_category'] == 4) {
						$output .= $result['item_size'].'"';
					} else if($result['asset_category'] == 19 || $result['asset_category'] == 20) {
						$output .= $result['item_size']."GB";
					}
				}
				$output .= "</td>";
				$output .= "<td>";
				if($result['asset_type'] == 1) {
					$output .= "Computer";
				} else if($result['asset_type'] == 2) {
					if($result['asset_category'] == 1) {
						$output .= "Printer";
					} else if($result['asset_category'] == 2) {
						$output .= "Tonor";
					} else if($result['asset_category'] == 3) {
						$output .= "Scanner";
					} else if($result['asset_category'] == 4) {
						$output .= "Computer Screen";
					} else if($result['asset_category'] == 5) {
						$output .= "Cable";
					} else if($result['asset_category'] == 6) {
						$output .= "Keyboard";
					} else if($result['asset_category'] == 7) {
						$output .= "Mouse";
					} else if($result['asset_category'] == 8) {
						$output .= "Speaker";
					} else if($result['asset_category'] == 9) {
						$output .= "Microphone";
					} else if($result['asset_category'] == 10) {
						$output .= "Network Switch";
					} else if($result['asset_category'] == 11) {
						$output .= "Network HUB";
					} else if($result['asset_category'] == 12) {
						$output .= "Network Router";
					} else if($result['asset_category'] == 13) {
						$output .= "Media Converter";
					} else if($result['asset_category'] == 14) {
						$output .= "Extension";
					} else if($result['asset_category'] == 15) {
						$output .= "Tools";
					} else if($result['asset_category'] == 16) {
						$output .= "Ethernet Connector";
					} else if($result['asset_category'] == 17) {
						$output .= "Tie";
					} else if($result['asset_category'] == 18) {
						$output .= "Network Cable";
					} else if($result['asset_category'] == 19) {
						$output .= "RAM";
					} else if($result['asset_category'] == 20) {
						$output .= "ROM";
					}
				}
				$output .= "</td>";
				$output .= "<td>";
				if($result['asset_type'] == 2) {
					if($result['asset_category'] == 18) {
						$output .= $result['qty']." Feet";
					} else {
						$output .= $result['qty'];
					}
				} else {
					$output .= $result['qty'];
				}
				$output .= "</td>";
				$output .= "<td><div class='btn-group'>";
				// $output .= "<a class='btn btn-success btn-sm'><i class='fas fa-eye'></i></a>";
				if(is_superadmin() || is_admin()) {
					if(mysqli_num_rows(mysqli_query($conn, "SELECT * FROM deploy_assets WHERE asset_id='{$result['id']}' && active_status='1' && delete_status='0'")) == 0) {
						$output .= "<a href='asset-edit.php?id=".$result['id']."' class='btn btn-primary btn-sm'><i class='fas fa-edit'></i></a>";
						$output .= "<a class='btn btn-danger btn-sm asset_delete_btn' data-id='".$result['id']."'><i class='fas fa-trash'></i></a>";
					}
				}
				$output .= "</div></td>";
				$output .= "</tr>";

			}

		} else {
			$output .= "<tr><td colspan='9' class='text-center'>No Record Found</td></tr>";
		}
		
	}

	echo $output;

}


if(isset($_POST['action']) && $_POST['action'] == 'display_faulty_assets') {

	$output = '';


	$query = mysqli_query($conn, "SELECT f.voucher_number, f.people_id, f.asset_id, f.qty, a.id, a.igr_number, a.igr_date, a.asset_type, a.asset_category, a.asset_name, a.item_type, a.item_size FROM faulty_assets f LEFT JOIN assets a ON f.asset_id=a.id WHERE a.active_status='1' && a.delete_status='0' && a.parent_id is NULL");

	if(mysqli_num_rows($query) > 0) {

		$i = 1;
		while($result = mysqli_fetch_assoc($query)) {

			$output .= "<tr>";
			$output .= "<td>".$result['igr_number']."</td>";
			$output .= "<td>".$result['voucher_number']."</td>";
			$output .= "<td>".people_name($result['people_id'])."</td>";
			$output .= "<td>".$result['asset_name']."</td>";
			if($result['asset_type'] == 2) {
				if($result['asset_category'] == 14 || $result['asset_category'] == 15 || $result['asset_category'] == 16 || $result['asset_category'] == 17) {
					$output .= "<td></td><td></td><td></td>";
				} else {
					$output .= "<td>".asset_meta($result['id'], 'brand_name')."</td>";
					$output .= "<td>".asset_meta($result['id'], 'serial_number')."</td>";
					$output .= "<td>".asset_meta($result['id'], 'model_number')."</td>";
				}
			} else {
				$output .= "<td>".asset_meta($result['id'], 'brand_name')."</td>";
				$output .= "<td>".asset_meta($result['id'], 'serial_number')."</td>";
				$output .= "<td>".asset_meta($result['id'], 'model_number')."</td>";
			}
			$output .= "<td>";
			if($result['asset_type'] == 2) {
				if($result['asset_category'] == 5 || $result['asset_category'] == 6 || $result['asset_category'] == 7 || $result['asset_category'] == 8 || $result['asset_category'] == 9) {
					$output .= $result['item_type'];
				} else if($result['asset_category'] == 10 || $result['asset_category'] == 11 || $result['asset_category'] == 12) {
					$output .= $result['item_type']." Ports";
				} else if($result['asset_category'] == 19) {
					$output .= "DDR".$result['item_type'];
				} else if($result['asset_category'] == 20) {
					$output .= $result['item_type'];
				}
			}
			$output .= "</td>";
			$output .= "<td>";
			if($result['asset_type'] == 2) {
				if($result['asset_category'] == 4) {
					$output .= $result['item_size'].'"';
				} else if($result['asset_category'] == 19 || $result['asset_category'] == 20) {
					$output .= $result['item_size']."GB";
				}
			}
			$output .= "</td>";
			$output .= "<td>";
			if($result['asset_type'] == 1) {
				$output .= "Computer";
			} else if($result['asset_type'] == 2) {
				if($result['asset_category'] == 1) {
					$output .= "Printer";
				} else if($result['asset_category'] == 2) {
					$output .= "Tonor";
				} else if($result['asset_category'] == 3) {
					$output .= "Scanner";
				} else if($result['asset_category'] == 4) {
					$output .= "Computer Screen";
				} else if($result['asset_category'] == 5) {
					$output .= "Cable";
				} else if($result['asset_category'] == 6) {
					$output .= "Keyboard";
				} else if($result['asset_category'] == 7) {
					$output .= "Mouse";
				} else if($result['asset_category'] == 8) {
					$output .= "Speaker";
				} else if($result['asset_category'] == 9) {
					$output .= "Microphone";
				} else if($result['asset_category'] == 10) {
					$output .= "Network Switch";
				} else if($result['asset_category'] == 11) {
					$output .= "Network HUB";
				} else if($result['asset_category'] == 12) {
					$output .= "Network Router";
				} else if($result['asset_category'] == 13) {
					$output .= "Media Converter";
				} else if($result['asset_category'] == 14) {
					$output .= "Extension";
				} else if($result['asset_category'] == 15) {
					$output .= "Tools";
				} else if($result['asset_category'] == 16) {
					$output .= "Ethernet Connector";
				} else if($result['asset_category'] == 17) {
					$output .= "Tie";
				} else if($result['asset_category'] == 18) {
					$output .= "Network Cable";
				} else if($result['asset_category'] == 19) {
					$output .= "RAM";
				} else if($result['asset_category'] == 20) {
					$output .= "ROM";
				}
			}
			$output .= "</td>";
			$output .= "<td>";
			if($result['asset_type'] == 2) {
				if($result['asset_category'] == 18) {
					$output .= $result['qty']." Feet";
				} else {
					$output .= $result['qty'];
				}
			} else {
				$output .= $result['qty'];
			}
			$output .= "</td>";
			$output .= "<td><div class='btn-group'>";
			$output .= "<a class='btn btn-success btn-sm repair_asset' data-id='".$result['id']."'>Repair</a>";
			$output .= "<a class='btn btn-danger btn-sm defect_asset' data-id='".$result['id']."'>Defect</a>";
			$output .= "</div></td>";
			$output .= "</tr>";

		}

	} else {
		$output .= "<tr><td colspan='10' class='text-center'>No Record Found</td></tr>";
	}

	echo $output;

}



if(isset($_POST['action']) && $_POST['action'] == 'repair_asset_display') {

	$output = '';
	$id = strip_tags(mysqli_real_escape_string($conn, $_POST['id']));

	if($id != '' && $id != 0) {

		$query = mysqli_query($conn, "SELECT * FROM faulty_assets WHERE asset_id='$id'");
		if(mysqli_num_rows($query) > 0) {

			$result = mysqli_fetch_assoc($query);

			$output .= "<input type='hidden' value='".$result['id']."' name='id'>";
			$output .= "<input type='hidden' value='".$id."' name='asset_id'>";
			$output .= "<input type='hidden' value='repair_asset' name='action'>";

			$output .= "<div class='mb-3'>";
				$output .= "<label>Quantity:</label>";
				$output .= "<input type='number' class='form-control form-control-border' placeholder='Enter Repair Quantity' max='".$result['qty']."' value='".$result['qty']."' id='repair_qty' name='repair_qty' required>";
			$output .= "</div>";

		}

	}

	echo $output;

}


if(isset($_POST['action']) && $_POST['action'] == 'repair_asset') {

	$id = strip_tags(mysqli_real_escape_string($conn, $_POST['id']));
	$asset_id = strip_tags(mysqli_real_escape_string($conn, $_POST['asset_id']));
	$qty = strip_tags(mysqli_real_escape_string($conn, $_POST['repair_qty']));

	if($id != '' && $id != 0 && $qty != '' && $qty != 0) {

		$check_query = mysqli_query($conn, "SELECT * FROM faulty_assets WHERE id='$id'");
		if(mysqli_num_rows($check_query) > 0) {
			$check_result = mysqli_fetch_assoc($check_query);
			$query = mysqli_query($conn, "UPDATE assets SET qty=qty+$qty WHERE id='$asset_id'");

			if($qty == $check_result['qty']) {
				$delete_query = mysqli_query($conn, "DELETE FROM faulty_assets WHERE id='$id'");
			} else {
				$delete_query = mysqli_query($conn, "UPDATE faulty_assets SET qty=qty-$qty WHERE id='$id'");
			}

			if($query && $delete_query) {
				echo 2;
			} else {
				echo 1;
			}
		}

	}

}


if(isset($_POST['action']) && $_POST['action'] == 'defect_asset_display') {

	$output = '';
	$id = strip_tags(mysqli_real_escape_string($conn, $_POST['id']));

	if($id != '' && $id != 0) {

		$query = mysqli_query($conn, "SELECT * FROM faulty_assets WHERE asset_id='$id'");
		if(mysqli_num_rows($query) > 0) {

			$result = mysqli_fetch_assoc($query);

			$output .= "<input type='hidden' value='".$result['id']."' name='id'>";
			$output .= "<input type='hidden' value='".$id."' name='asset_id'>";
			$output .= "<input type='hidden' value='defect_asset' name='action'>";

			$output .= "<div class='mb-3'>";
				$output .= "<label>Quantity:</label>";
				$output .= "<input type='number' class='form-control form-control-border' placeholder='Enter Defect Quantity' max='".$result['qty']."' value='".$result['qty']."' id='defect_qty' name='defect_qty' required>";
			$output .= "</div>";

		}

	}

	echo $output;

}


if(isset($_POST['action']) && $_POST['action'] == 'defect_asset') {

	$id = strip_tags(mysqli_real_escape_string($conn, $_POST['id']));
	$asset_id = strip_tags(mysqli_real_escape_string($conn, $_POST['asset_id']));
	$qty = strip_tags(mysqli_real_escape_string($conn, $_POST['defect_qty']));

	if($id != '' && $id != 0 && $qty != '' && $qty != 0) {

		$check_query = mysqli_query($conn, "SELECT * FROM faulty_assets WHERE id='$id'");
		if(mysqli_num_rows($check_query) > 0) {
			$check_result = mysqli_fetch_assoc($check_query);
			$query = mysqli_query($conn, "INSERT INTO defect_assets(voucher_number, people_id, asset_id, qty, time_created) VALUES('{$check_result['voucher_number']}', '{$check_result['people_id']}', '$asset_id', '$qty', '$time_created')");

			if($qty == $check_result['qty']) {
				$delete_query = mysqli_query($conn, "DELETE FROM faulty_assets WHERE id='$id'");
			} else {
				$delete_query = mysqli_query($conn, "UPDATE faulty_assets SET qty=qty-$qty WHERE id='$id'");
			}

			if($query && $delete_query) {
				echo 2;
			} else {
				echo 1;
			}
		}

	}

}


if(isset($_POST['action']) && $_POST['action'] == 'display_defect_assets') {

	$output = '';


	$query = mysqli_query($conn, "SELECT d.voucher_number, d.people_id, d.asset_id, d.qty, a.id, a.igr_number, a.igr_date, a.asset_type, a.asset_category, a.asset_name, a.item_type, a.item_size FROM defect_assets d LEFT JOIN assets a ON d.asset_id=a.id WHERE a.active_status='1' && a.delete_status='0' && a.parent_id is NULL");

	if(mysqli_num_rows($query) > 0) {

		$i = 1;
		while($result = mysqli_fetch_assoc($query)) {

			$output .= "<tr>";
			$output .= "<td>".$result['igr_number']."</td>";
			$output .= "<td>".$result['voucher_number']."</td>";
			$output .= "<td>".people_name($result['people_id'])."</td>";
			$output .= "<td>".$result['asset_name']."</td>";
			if($result['asset_type'] == 2) {
				if($result['asset_category'] == 14 || $result['asset_category'] == 15 || $result['asset_category'] == 16 || $result['asset_category'] == 17) {
					$output .= "<td></td><td></td><td></td>";
				} else {
					$output .= "<td>".asset_meta($result['id'], 'brand_name')."</td>";
					$output .= "<td>".asset_meta($result['id'], 'serial_number')."</td>";
					$output .= "<td>".asset_meta($result['id'], 'model_number')."</td>";
				}
			} else {
				$output .= "<td>".asset_meta($result['id'], 'brand_name')."</td>";
				$output .= "<td>".asset_meta($result['id'], 'serial_number')."</td>";
				$output .= "<td>".asset_meta($result['id'], 'model_number')."</td>";
			}
			$output .= "<td>";
			if($result['asset_type'] == 2) {
				if($result['asset_category'] == 5 || $result['asset_category'] == 6 || $result['asset_category'] == 7 || $result['asset_category'] == 8 || $result['asset_category'] == 9) {
					$output .= $result['item_type'];
				} else if($result['asset_category'] == 10 || $result['asset_category'] == 11 || $result['asset_category'] == 12) {
					$output .= $result['item_type']." Ports";
				} else if($result['asset_category'] == 19) {
					$output .= "DDR".$result['item_type'];
				} else if($result['asset_category'] == 20) {
					$output .= $result['item_type'];
				}
			}
			$output .= "</td>";
			$output .= "<td>";
			if($result['asset_type'] == 2) {
				if($result['asset_category'] == 4) {
					$output .= $result['item_size'].'"';
				} else if($result['asset_category'] == 19 || $result['asset_category'] == 20) {
					$output .= $result['item_size']."GB";
				}
			}
			$output .= "</td>";
			$output .= "<td>";
			if($result['asset_type'] == 1) {
				$output .= "Computer";
			} else if($result['asset_type'] == 2) {
				if($result['asset_category'] == 1) {
					$output .= "Printer";
				} else if($result['asset_category'] == 2) {
					$output .= "Tonor";
				} else if($result['asset_category'] == 3) {
					$output .= "Scanner";
				} else if($result['asset_category'] == 4) {
					$output .= "Computer Screen";
				} else if($result['asset_category'] == 5) {
					$output .= "Cable";
				} else if($result['asset_category'] == 6) {
					$output .= "Keyboard";
				} else if($result['asset_category'] == 7) {
					$output .= "Mouse";
				} else if($result['asset_category'] == 8) {
					$output .= "Speaker";
				} else if($result['asset_category'] == 9) {
					$output .= "Microphone";
				} else if($result['asset_category'] == 10) {
					$output .= "Network Switch";
				} else if($result['asset_category'] == 11) {
					$output .= "Network HUB";
				} else if($result['asset_category'] == 12) {
					$output .= "Network Router";
				} else if($result['asset_category'] == 13) {
					$output .= "Media Converter";
				} else if($result['asset_category'] == 14) {
					$output .= "Extension";
				} else if($result['asset_category'] == 15) {
					$output .= "Tools";
				} else if($result['asset_category'] == 16) {
					$output .= "Ethernet Connector";
				} else if($result['asset_category'] == 17) {
					$output .= "Tie";
				} else if($result['asset_category'] == 18) {
					$output .= "Network Cable";
				} else if($result['asset_category'] == 19) {
					$output .= "RAM";
				} else if($result['asset_category'] == 20) {
					$output .= "ROM";
				}
			}
			$output .= "</td>";
			$output .= "<td>";
			if($result['asset_type'] == 2) {
				if($result['asset_category'] == 18) {
					$output .= $result['qty']." Feet";
				} else {
					$output .= $result['qty'];
				}
			} else {
				$output .= $result['qty'];
			}
			$output .= "</td>";
			$output .= "</tr>";

		}

	} else {
		$output .= "<tr><td colspan='9' class='text-center'>No Record Found</td></tr>";
	}

	echo $output;

}










// ******************************** Deploy Asset ****************************************

if(isset($_POST['action']) && $_POST['action'] == 'display_computer_quantity') {

	$id = strip_tags(mysqli_real_escape_string($conn, $_POST['id']));

	$query = mysqli_query($conn, "SELECT * FROM computers WHERE active_status='1' && delete_status='0' && id='$id'");

	if(mysqli_num_rows($query) > 0) {
		$result = mysqli_fetch_assoc($query);
		echo "<div class='mb-3'><label>Quantity Deployed:</label><input type='number' class='form-control form-control-border' placeholder='Enter Quantity' max='".$result['qty']."' id='deploy_quantity' name='deploy_quantity' required><div id='deploy_quantity_msg'></div></div>";
	}

}

if(isset($_POST['action']) && $_POST['action'] == 'display_cable_quantity') {

	$id = strip_tags(mysqli_real_escape_string($conn, $_POST['id']));

	$query = mysqli_query($conn, "SELECT * FROM accessories WHERE item_category='5' && active_status='1' && delete_status='0' && id='$id'");

	if(mysqli_num_rows($query) > 0) {
		$result = mysqli_fetch_assoc($query);
		echo "<div class='mb-3'><label>Quantity Deployed:</label><input type='number' class='form-control form-control-border' placeholder='Enter Quantity' max='".$result['qty']."' id='deploy_quantity' name='deploy_quantity' required><div id='deploy_quantity_msg'></div></div>";
	}

}

if(isset($_POST['action']) && $_POST['action'] == 'display_quantity') {

	$id = strip_tags(mysqli_real_escape_string($conn, $_POST['id']));

	$query = mysqli_query($conn, "SELECT * FROM accessories WHERE active_status='1' && delete_status='0' && id='$id'");

	if(mysqli_num_rows($query) > 0) {
		$result = mysqli_fetch_assoc($query);
		echo "<div class='mb-3'><label>Quantity Deployed:</label><input type='number' class='form-control form-control-border' placeholder='Enter Quantity' max='".$result['qty']."' id='deploy_quantity' name='deploy_quantity' required><div id='deploy_quantity_msg'></div></div>";
	}

}

if(isset($_POST['action']) && $_POST['action'] == 'display_deploy_asset_computer_ram') {

	$output = '';

	$query = mysqli_query($conn, "SELECT * FROM assets WHERE asset_type='2' && active_status='1' && delete_status='0'");

	if(mysqli_num_rows($query) > 0) {
		$ram_query = mysqli_query($conn, "SELECT * FROM accessories WHERE item_category='19' && active_status='1' && delete_status='0'");
		if(mysqli_num_rows($ram_query) > 0) {
			$output .= "<option value=''>Select RAM Type with Size</option>";
			while($ram_result = mysqli_fetch_assoc($ram_query)) {
				$output .= "<option value='".$ram_result['id']."'>DDR".$ram_result['type']." - ".$ram_result['item_size']."GB</option>";
			}
		}
	}

	echo $output;

}

if(isset($_POST['action']) && $_POST['action'] == 'display_deploy_asset_computer_ram_qty') {

	$id = strip_tags(mysqli_real_escape_string($conn, $_POST['id']));

	$query = mysqli_query($conn, "SELECT * FROM accessories WHERE id='$id' && active_status='1' && delete_status='0'");
	if(mysqli_num_rows($query) > 0) {
		$result = mysqli_fetch_assoc($query);
		echo $result['qty'];
	} else {
		echo '0';
	}

}


if(isset($_POST['action']) && $_POST['action'] == 'display_deploy_asset_computer_rom') {

	$output = '';

	$query = mysqli_query($conn, "SELECT * FROM assets WHERE asset_type='2' && active_status='1' && delete_status='0'");

	if(mysqli_num_rows($query) > 0) {
		$rom_query = mysqli_query($conn, "SELECT * FROM accessories WHERE item_category='20' && active_status='1' && delete_status='0'");
		if(mysqli_num_rows($rom_query) > 0) {
			$output .= "<option value=''>Select ROM Type with Size</option>";
			while($rom_result = mysqli_fetch_assoc($rom_query)) {
				$output .= "<option value='".$rom_result['id']."'>".$rom_result['type']." - ".$rom_result['item_size']."GB</option>";
			}
		}
	}

	echo $output;

}

if(isset($_POST['action']) && $_POST['action'] == 'display_deploy_asset_computer_rom_qty') {

	$id = strip_tags(mysqli_real_escape_string($conn, $_POST['id']));

	$query = mysqli_query($conn, "SELECT * FROM accessories WHERE id='$id' && active_status='1' && delete_status='0'");
	if(mysqli_num_rows($query) > 0) {
		$result = mysqli_fetch_assoc($query);
		echo $result['qty'];
	} else {
		echo '0';
	}

}



if(isset($_POST['action']) && $_POST['action'] == 'deploy_assets') {

	$voucher_number = strtoupper(strip_tags(mysqli_real_escape_string($conn, $_POST['voucher_number'])));
	$voucher_date = strtoupper(strip_tags(mysqli_real_escape_string($conn, $_POST['voucher_date'])));
	$deploy_to = strip_tags(mysqli_real_escape_string($conn, $_POST['deploy_to']));
	$people_id = strip_tags(mysqli_real_escape_string($conn, $_POST['deploy_people']));
	$department_id = strip_tags(mysqli_real_escape_string($conn, $_POST['deploy_department']));
	$asset_total = sizeof($_POST['asset_id']);

	if($voucher_number != '' && $voucher_date != '' && $deploy_to != '' && $people_id != '' && $department_id != '' && $asset_total > 0) {

		for($i = 0; $i < $asset_total; $i++) {

			$asset_id = strip_tags(mysqli_real_escape_string($conn, $_POST['asset_id'][$i]));
			$asset_qty = strip_tags(mysqli_real_escape_string($conn, $_POST['asset_qty'][$i]));

			if($asset_id != '' && $asset_qty != '') {

				$check_asset_query = mysqli_query($conn, "SELECT * FROM assets WHERE id='$asset_id'");

				if(mysqli_num_rows($check_asset_query) > 0) {

					$result = mysqli_fetch_assoc($check_asset_query);

					if($result['asset_type'] == 1) {

						$query = mysqli_query($conn, "INSERT INTO deploy_assets(user_id, voucher_number, voucher_date, deploy_to, people_id, department_id, asset_id, qty, time_created) VALUES('$user_id', '$voucher_number', '$voucher_date', '$deploy_to', '$people_id', '$department_id', '$asset_id', '$asset_qty', '$time_created')");
						$deploy_id = mysqli_insert_id($conn);
						$update_qty = mysqli_query($conn, "UPDATE assets SET qty=qty-$asset_qty WHERE id='$asset_id'");

						$asset_accessories_query = mysqli_query($conn, "SELECT * FROM assets WHERE parent_id='$asset_id' && active_status='1' && delete_status='0'");
						if(mysqli_num_rows($asset_accessories_query) > 0) {

							while($asset_accessories_result = mysqli_fetch_assoc($asset_accessories_query)) {

								$accessories_query = mysqli_query($conn, "INSERT INTO deploy_assets(user_id, voucher_number, voucher_date, deploy_to, people_id, department_id, asset_id, qty, parent_id, time_created) VALUES('$user_id', '$voucher_number', '$voucher_date', '$deploy_to', '$people_id', '$department_id', '{$asset_accessories_result['id']}', '{$asset_accessories_result['qty']}', '$deploy_id', '$time_created')");
								$update_asset_accessories_qty = mysqli_query($conn, "UPDATE assets SET qty='0' WHERE id='{$asset_accessories_result['id']}'");

							}

						}

					} else if($result['asset_type'] == 2) {

						if($result['asset_category'] == 1) {

							$query = mysqli_query($conn, "INSERT INTO deploy_assets(user_id, voucher_number, voucher_date, deploy_to, people_id, department_id, asset_id, qty, time_created) VALUES('$user_id', '$voucher_number', '$voucher_date', '$deploy_to', '$people_id', '$department_id', '$asset_id', '$asset_qty', '$time_created')");
							$deploy_id = mysqli_insert_id($conn);
							$update_qty = mysqli_query($conn, "UPDATE assets SET qty=qty-$asset_qty WHERE id='$asset_id'");

							$asset_accessories_query = mysqli_query($conn, "SELECT * FROM assets WHERE parent_id='$asset_id' && active_status='1' && delete_status='0'");
							if(mysqli_num_rows($asset_accessories_query) > 0) {

								while($asset_accessories_result = mysqli_fetch_assoc($asset_accessories_query)) {

									$accessories_query = mysqli_query($conn, "INSERT INTO deploy_assets(user_id, voucher_number, voucher_date, deploy_to, people_id, department_id, asset_id, qty, parent_id, time_created) VALUES('$user_id', '$voucher_number', '$voucher_date', '$deploy_to', '$people_id', '$department_id', '{$asset_accessories_result['id']}', '{$asset_accessories_result['qty']}', '$deploy_id', '$time_created')");
									$update_asset_accessories_qty = mysqli_query($conn, "UPDATE assets SET qty='0' WHERE id='{$asset_accessories_result['id']}'");

								}

							}

						} else {

							$query = mysqli_query($conn, "INSERT INTO deploy_assets(user_id, voucher_number, voucher_date, deploy_to, people_id, department_id, asset_id, qty, time_created) VALUES('$user_id', '$voucher_number', '$voucher_date', '$deploy_to', '$people_id', '$department_id', '$asset_id', '$asset_qty', '$time_created')");
							$update_qty = mysqli_query($conn, "UPDATE assets SET qty=qty-$asset_qty WHERE id='$asset_id'");

						}

					}

				}

			}


		}

		if($query && $update_qty) {
			echo 2;
		} else {
			echo 1;
		}


		/*if($asset_type == 1) {

			$asset_id = strip_tags(mysqli_real_escape_string($conn, $_POST['computer_id']));

			if($asset_id != '' && $asset_id != 0) {
				$query = mysqli_query($conn, "INSERT INTO deploy_asset(voucher_number, voucher_date, deploy_to, people_id, department_id, asset_type, asset_id, qty, time_created) VALUES('$voucher_number', '$voucher_date', '$deploy_to', '$people_id', '$department_id', '$asset_type', '$asset_id', '1', '$time_created')");
				$computer_id = mysqli_insert_id($conn);

				$update_computer_qty = mysqli_query($conn, "UPDATE computers SET qty=qty-1 WHERE id='$asset_id'");
				$update_asset_qty = mysqli_query($conn, "UPDATE assets SET qty=qty-1 WHERE asset_type='1'");

				$total_ram = sizeof($_POST['computer_ram']);
				for($i = 0; $i < $total_ram; $i++) {

					if($_POST['computer_ram'][$i] != '' && $_POST['computer_ram'][$i] != 0 && $_POST['computer_ram_qty'][$i] != '' && $_POST['computer_ram_qty'][$i] != 0) {

						$ram_id = $_POST['computer_ram'][$i];
						$ram_qty = $_POST['computer_ram_qty'][$i];

						$ram_query = mysqli_query($conn, "INSERT INTO deploy_asset(voucher_number, voucher_date, deploy_to, people_id, department_id, asset_type, asset_id, qty, parent_id, time_created) VALUES('$voucher_number', '$voucher_date', '$deploy_to', '$people_id', '$department_id', '2', '$ram_id', '$ram_qty', '$computer_id', '$time_created')");
						$update_ram_qty = mysqli_query($conn, "UPDATE accessories SET qty=qty-$ram_qty WHERE id='$ram_id'");
						$update_accessories_qty = mysqli_query($conn, "UPDATE assets SET qty=qty-$ram_qty WHERE asset_type='2'");
					}

				}


				$total_rom = sizeof($_POST['computer_rom']);
				for($i = 0; $i < $total_rom; $i++) {

					if($_POST['computer_rom'][$i] != '' && $_POST['computer_rom'][$i] != 0 && $_POST['computer_rom_qty'][$i] != '' && $_POST['computer_rom_qty'][$i] != 0) {

						$rom_id = $_POST['computer_rom'][$i];
						$rom_qty = $_POST['computer_rom_qty'][$i];

						$rom_query = mysqli_query($conn, "INSERT INTO deploy_asset(voucher_number, voucher_date, deploy_to, people_id, department_id, asset_type, asset_id, qty, parent_id, time_created) VALUES('$voucher_number', '$voucher_date', '$deploy_to', '$people_id', '$department_id', '2', '$rom_id', '$rom_qty', '$computer_id', '$time_created')");
						$update_rom_qty = mysqli_query($conn, "UPDATE accessories SET qty=qty-$rom_qty WHERE id='$rom_id'");
						$update_accessories_qty = mysqli_query($conn, "UPDATE assets SET qty=qty-$rom_qty WHERE asset_type='2'");
					}

				}

				if($query && $update_computer_qty && $update_asset_qty) {
					echo 2;
				} else {
					echo 1;
				}

			} else {
				echo 0;
			}

		} else if($asset_type == 2) {

			$asset_category = strip_tags(mysqli_real_escape_string($conn, $_POST['asset_category']));

			if($asset_category == 1) {

				$printer_id = strip_tags(mysqli_real_escape_string($conn, $_POST['printer_id']));
				$deploy_qty = strip_tags(mysqli_real_escape_string($conn, $_POST['deploy_quantity']));

				if($printer_id != '' && $printer_id != 0 && $deploy_qty != '' && $deploy_qty != 0) {

					$query = mysqli_query($conn, "INSERT INTO deploy_asset(voucher_number, voucher_date, deploy_to, people_id, department_id, asset_type, asset_id, qty, time_created) VALUES('$voucher_number', '$voucher_date', '$deploy_to', '$people_id', '$department_id', '$asset_type', '$printer_id', '$deploy_qty', '$time_created')");
					$printer_id = mysqli_insert_id($conn);

					$update_printer_qty = mysqli_query($conn, "UPDATE accessories SET qty=qty-$deploy_qty WHERE id='$printer_id'");
					$update_asset_qty = mysqli_query($conn, "UPDATE assets SET qty=qty-$deploy_qty WHERE asset_type='2'");

					$check_tonor_query = mysqli_query($conn, "SELECT * FROM accessories WHERE parent_id='$printer_id' && active_status='1'");

					if(mysqli_num_rows($check_tonor_query) > 0) {
						$check_tonor_result = mysqli_fetch_assoc($check_tonor_query);

						$tonor_query = mysqli_query($conn, "INSERT INTO deploy_asset(voucher_number, voucher_date, deploy_to, people_id, department_id, asset_type, asset_id, qty, time_created) VALUES('$voucher_number', '$voucher_date', '$deploy_to', '$people_id', '$department_id', '$asset_type', '{$check_tonor_result['id']}', '$deploy_qty', '$time_created')");
						$tonor_id = mysqli_insert_id($conn);

						$update_tonor_qty = mysqli_query($conn, "UPDATE accessories SET qty=qty-$deploy_qty WHERE id='$tonor_id'");
						$update_tonor_accessories_qty = mysqli_query($conn, "UPDATE assets SET qty=qty-$deploy_qty WHERE asset_type='2'");
					} else {
						echo 4;
					}

					if($query && $update_printer_qty && $tonor_query && $update_tonor_qty) {
						echo 1;
					} else {
						echo 0;
					}

				}

			} else if($asset_category == 2 || $asset_category == 3 || $asset_category == 4 || $asset_category == 5 || $asset_category == 6 || $asset_category == 7 || $asset_category == 8 || $asset_category == 9 || $asset_category == 10 || $asset_category == 11 || $asset_category == 12 || $asset_category == 13 || $asset_category == 14 || $asset_category == 15 || $asset_category == 16 || $asset_category == 17 || $asset_category == 18 || $asset_category == 19 || $asset_category == 20) {

				$asset_id = strip_tags(mysqli_real_escape_string($conn, $_POST['asset_id']));
				$deploy_qty = strip_tags(mysqli_real_escape_string($conn, $_POST['deploy_quantity']));

				if($asset_id != '' && $asset_id != 0 && $deploy_qty != '' && $deploy_qty != 0) {

					$query = mysqli_query($conn, "INSERT INTO deploy_asset(voucher_number, voucher_date, deploy_to, people_id, department_id, asset_type, asset_id, qty, time_created) VALUES('$voucher_number', '$voucher_date', '$deploy_to', '$people_id', '$department_id', '$asset_type', '$asset_id', '$deploy_qty', '$time_created')");

					$update_product_qty = mysqli_query($conn, "UPDATE accessories SET qty=qty-$deploy_qty WHERE id='$product_id'");
					$update_asset_qty = mysqli_query($conn, "UPDATE assets SET qty=qty-$deploy_qty WHERE asset_type='2'");

				}

			}

		}*/

	} else {
		echo 0;
	}

}



if(isset($_POST['action']) && $_POST['action'] == 'display_deploy_assets') {

	$output = '';
	$id = strip_tags(mysqli_real_escape_string($conn, $_POST['id']));
	$deploy_to = strip_tags(mysqli_real_escape_string($conn, $_POST['deploy_to']));

	if($id != '' && $id != 0 && $deploy_to != '' && $deploy_to != 0) {

		if($deploy_to == 1) {
			$query = mysqli_query($conn, "SELECT * FROM deploy_assets WHERE people_id='$id' && deploy_to='$deploy_to' && active_status='1' && delete_status='0'");
		} else if($deploy_to == 2) {
			$query = mysqli_query($conn, "SELECT * FROM deploy_assets WHERE department_id='$id' && deploy_to='$deploy_to' && active_status='1' && delete_status='0'");
		}

		if(mysqli_num_rows($query) > 0) {
			$i = 1;
			while($result = mysqli_fetch_assoc($query)) {

				$output .= "<tr>";
				$output .= "<td>".$i."</td>";
				$output .= "<td>".$result['voucher_number']."</td>";
				$output .= "<td>".$result['voucher_date']."</td>";
				$output .= "<td>".asset_name($result['asset_id'])."</td>";
				$output .= "<td>".$result['qty']."</td>";
				$output .= "<td><div class='btn-group'>";
				if(is_superadmin() || is_admin()) {
					$output .= "<button class='btn btn-primary edit_deploy_asset_btn btn-sm' data-id='".$result['id']."'><i class='fas fa-edit'></i></button>";
					$output .= "<button class='btn btn-danger delete_deploy_asset_btn btn-sm' data-id='".$result['id']."'><i class='fas fa-trash'></i></button>";
				}
				$output .= "</div></td>";
				$output .= "</tr>";

				$i++;
			}
		}

	}

	echo $output;

}


if(isset($_POST['action']) && $_POST['action'] == 'edit_deploy_asset_display') {

	$output = '';
	$id = strip_tags(mysqli_real_escape_string($conn, $_POST['id']));

	if($id != '' && $id != 0) {

		if(is_superadmin() || is_admin()) {
			$query = mysqli_query($conn, "SELECT * FROM deploy_assets WHERE id='$id'");

			if(mysqli_num_rows($query) > 0) {
				$result = mysqli_fetch_assoc($query);

				$asset_query = mysqli_query($conn, "SELECT * FROM assets WHERE id='{$result['asset_id']}' && active_status='1' && delete_status='0'");
				if(mysqli_num_rows($asset_query) > 0) {
					$asset_result = mysqli_fetch_assoc($asset_query);
					$asset_qty = $asset_result['qty'];
				} else {
					$asset_qty = 0;
				}

				$output .= "<input type='hidden' value='".$id."' name='id'>";
				$output .= "<input type='hidden' value='edit_deploy_asset' name='action'>";

				$output .= '<div class="mb-3"><label>Quantity:</label><input type="number" value="'.$result['qty'].'" placeholder="Enter Deploy Asset Quantity Maximum '.($asset_qty + $result['qty']).'" id="edit_deploy_asset_qty" max="'.($asset_qty + $result['qty']).'" class="form-control form-control-border" name="edit_deploy_asset_qty"></div>';
			}
		}

	}

	echo $output;

}


if(isset($_POST['action']) && $_POST['action'] == 'edit_deploy_asset') {

	$id = strip_tags(mysqli_real_escape_string($conn, $_POST['id']));
	$qty = strip_tags(mysqli_real_escape_string($conn, $_POST['edit_deploy_asset_qty']));

	if(is_superadmin() || is_admin()) {
		$check_current_deploy_query = mysqli_query($conn, "SELECT * FROM deploy_assets WHERE id='$id'");

		if(mysqli_num_rows($check_current_deploy_query) > 0) {
			$check_current_deploy_result = mysqli_fetch_assoc($check_current_deploy_query);
			$current_stock_qty = asset_qty($check_current_deploy_result['asset_id']);
			$total_stock_qty = $check_current_deploy_result['qty'] + $current_stock_qty;

			if($total_stock_qty <= $qty) {
				$new_stock = $total_stock_qty - $qty;

				$query = mysqli_query($conn, "UPDATE deploy_assets SET qty='$qty' WHERE id='$id'");
				$update_qty = mysqli_query($conn, "UPDATE assets SET qty='$new_stock' WHERE id='{$check_current_deploy_result['asset_id']}'");

				if($query && $update_qty) {
					echo 2;
				} else {
					echo 1;
				}
			}

		}
	}

}


if(isset($_POST['action']) && $_POST['action'] == 'delete_deploy_asset') {

	$id = strip_tags(mysqli_real_escape_string($conn, $_POST['id']));

	if($id != '' && $id != 0) {

		if(is_superadmin() || is_admin()) {
			$check_asset_query = mysqli_query($conn, "SELECT * FROM deploy_assets WHERE id='$id'");

			if(mysqli_num_rows($check_asset_query) > 0) {
				$check_asset_result = mysqli_fetch_assoc($check_asset_query);
				$qty = $check_asset_result['qty'];

				$query = mysqli_query($conn, "DELETE FROM deploy_assets WHERE id='$id'");
				$update_qty = mysqli_query($conn, "UPDATE assets SET qty=qty+$qty WHERE id='{$check_asset_result['asset_id']}'");

				if($query && $update_qty) {
					echo 2;
				} else {
					echo 1;
				}
			}
		}

	}

}


if(isset($_POST['action']) && $_POST['action'] == 'display_all_deploy_assets') {

	$output = '';

	$query = mysqli_query($conn, "SELECT * FROM deploy_assets WHERE active_status='1' && delete_status='0'");

	if(mysqli_num_rows($query) > 0) {
		$i = 1;
		while($result = mysqli_fetch_assoc($query)) {

			$assets_query = mysqli_query($conn, "SELECT * FROM assets WHERE id='{$result['asset_id']}' && active_status='1' && delete_status='0'");
			$assets_result = mysqli_fetch_assoc($assets_query);

			$output .= "<tr>";
			$output .= "<td>".$i."</td>";
			$output .= "<td>".$result['voucher_number']."</td>";
			$output .= "<td>".$result['voucher_date']."</td>";
			$output .= "<td>";

			if($assets_result['asset_type'] == 1) {
				$output .= $assets_result['asset_name']." - ".asset_meta($assets_result['id'], 'brand_name')." - ".asset_meta($assets_result['id'], 'serial_number')." - ".asset_meta($assets_result['id'], 'model_number')."<br>";
				$output .= asset_meta($assets_result['id'], 'processor_detail')." Processor<br>";
				$output .= asset_meta($assets_result['id'], 'power_supply')." Power Supply<br>";
				$computer_query = mysqli_query($conn, "SELECT * FROM assets WHERE parent_id='{$assets_result['id']}' && active_status='1' && delete_status='0'");
			} else if($assets_result['asset_type'] == 2) {
				if($assets_result['asset_category'] == 1) {
					$output .= asset_meta($assets_result['id'], 'brand_name')." - ".asset_meta($assets_result['id'], 'serial_number')." - ".asset_meta($assets_result['id'], 'model_number')."<br>";
				} else if($assets_result['asset_category'] == 2 || $assets_result['asset_category'] == 3 || $assets_result['asset_category'] == 13) {
					$output .= $assets_result['asset_name']." - ".asset_meta($assets_result['id'], 'brand_name')." - ".asset_meta($assets_result['id'], 'serial_number')." - ".asset_meta($assets_result['id'], 'model_number')."<br>";
				} else if($assets_result['asset_category'] == 4) {
					$output .= $assets_result['asset_name']." - ".asset_meta($assets_result['id'], 'brand_name')." - ".asset_meta($assets_result['id'], 'serial_number')." - ".asset_meta($assets_result['id'], 'model_number')." - Dimension: ".$assets_result['item_size']."\"<br>";
				} else if($assets_result['asset_category'] == 5) {
					$output .= $assets_result['asset_name']." - ".$assets_result['item_type']."<br>";
				} else if($assets_result['asset_category'] == 6 || $assets_result['asset_category'] == 7 || $assets_result['asset_category'] == 8 || $assets_result['asset_category'] == 9) {
					$output .= $assets_result['item_type'].$assets_result['asset_name']." - ".asset_meta($assets_result['id'], 'brand_name')." - ".asset_meta($assets_result['id'], 'serial_number')." - ".asset_meta($assets_result['id'], 'model_number')."<br>";
				} else if($assets_result['asset_category'] == 10 || $assets_result['asset_category'] == 11 || $assets_result['asset_category'] == 12) {
					$output .= $assets_result['asset_name']." - ".asset_meta($assets_result['id'], 'brand_name')." - ".asset_meta($assets_result['id'], 'serial_number')." - ".asset_meta($assets_result['id'], 'model_number')." - ".$assets_result['item_type']."<br>";
				} else if($assets_result['asset_category'] == 14 || $assets_result['asset_category'] == 15 || $assets_result['asset_category'] == 16 || $assets_result['asset_category'] == 17 || $assets_result['asset_category'] == 18) {
					$output .= $assets_result['asset_name']."<br>";
				} else if($assets_result['asset_category'] == 19) {
					$output .= "DDR".$assets_result['item_type']." - ".$assets_result['item_size']."GB -".$assets_result['asset_name']." - ".asset_meta($assets_result['id'], 'brand_name')." - ".asset_meta($assets_result['id'], 'serial_number')." - ".asset_meta($assets_result['id'], 'model_number')."<br>";
				} else if($assets_result['asset_category'] == 20) {
					$output .= $assets_result['item_type']." - ".$assets_result['item_size']."GB -".$assets_result['asset_name']." - ".asset_meta($assets_result['id'], 'brand_name')." - ".asset_meta($assets_result['id'], 'serial_number')." - ".asset_meta($assets_result['id'], 'model_number')."<br>";
				}
			}

			$output .= "</td>";
			$output .= "<td>";
			if($assets_result['asset_type'] == 2 && $assets_result['asset_category'] == 18) {
				$output .= $result['qty']." Feet";
			} else {
				$output .= $result['qty'];
			}
			$output .= "</td>";
			$output .= "<td><div class='btn-group'>";
			if(is_superadmin() || is_admin()) {
				$output .= "<button class='btn btn-primary edit_deploy_asset_btn btn-sm' data-id='".$result['id']."'><i class='fas fa-edit'></i></button>";
				$output .= "<button class='btn btn-danger delete_deploy_asset_btn btn-sm' data-id='".$result['id']."'><i class='fas fa-trash'></i></button>";
			}
			$output .= "</div></td>";
			$output .= "</tr>";

			$i++;
		}
	}

	echo $output;

}





// ******************************** IGRs ****************************************


if(isset($_POST['action']) && $_POST['action'] == 'check_igr_number') {

	$igr_number = strtoupper(strip_tags(mysqli_real_escape_string($conn, $_POST['igr_number'])));

	if($igr_number != '' && $igr_number != 0) {

		$query = mysqli_query($conn, "SELECT * FROM assets WHERE igr_number='$igr_number'");
		if(mysqli_num_rows($query) == 0) {
			echo 2;
		} else {
			echo 1;
		}

	}

}


if(isset($_POST['action']) && $_POST['action'] == 'display_vouchers') {

	$output = '';

	$query = mysqli_query($conn, "SELECT distinct(voucher_number), voucher_date FROM deploy_assets WHERE active_status='1' && delete_status='0'");

	if(mysqli_num_rows($query) > 0) {

		$i = 1;
		while($result = mysqli_fetch_assoc($query)) {

			$output .= "<tr>";
			$output .= "<td>".$i."</td>";
			$output .= "<td>".$result['voucher_number']."</td>";
			$output .= "<td>".$result['voucher_date']."</td>";
			$output .= "<td><div class='btn-group'>";
			$output .= "<a class='btn btn-primary' target='_blank' href='voucher-print.php?voucher_number=".$result['voucher_number']."&voucher_date=".$result['voucher_date']."'><i class='fas fa-print'></i></a>";
			$output .= "</div><td>";
			$output .= "</tr>";

			$i++;

		}

	} else {
		$output .= "<tr><td colspan='4' class='text-center'>No Record Found</td></tr>";
	}

	echo $output;

}


if(isset($_POST['action']) && $_POST['action'] == 'display_igr_numbers') {
	$output = '';

	$query = mysqli_query($conn, "SELECT distinct(igr_number), igr_date FROM assets WHERE active_status='1' && delete_status='0' ORDER BY id DESC");
	$output .= "<option value=''>Select IGR Number</option>";
	if(mysqli_num_rows($query) > 0) {
		while($result = mysqli_fetch_assoc($query)) {
			$output .= "<option value='".$result['igr_number']."'>".$result['igr_number']." : ".$result['igr_date']."</option>";
		}
	}

	echo $output;

}


if(isset($_POST['action']) && $_POST['action'] == 'display_igr_date') {
	$igr_number = strtoupper(strip_tags(mysqli_real_escape_string($conn, $_POST['igr_number'])));
	$output = '';

	$query = mysqli_query($conn, "SELECT igr_date FROM assets WHERE igr_number='$igr_number' && active_status='1' && delete_status='0' LIMIT 1");
	if(mysqli_num_rows($query) > 0) {
		$result = mysqli_fetch_assoc($query);
		$output .= "<input type='hidden' value='".$result['igr_date']."' name='igr_date'>";
	}

	echo $output;
}


if(isset($_POST['action']) && $_POST['action'] == 'check_voucher_number') {

	$voucher_number = strtoupper(strip_tags(mysqli_real_escape_string($conn, $_POST['voucher_number'])));

	if($voucher_number != '' && $voucher_number != 0) {

		$query = mysqli_query($conn, "SELECT * FROM deploy_assets WHERE voucher_number='$voucher_number'");
		if(mysqli_num_rows($query) == 0) {
			echo 2;
		} else {
			echo 1;
		}

	}

}


if(isset($_POST['action']) && $_POST['action'] == 'display_voucher_numbers') {
	$output = '';

	$query = mysqli_query($conn, "SELECT distinct(voucher_number), people_id, voucher_date FROM deploy_assets WHERE active_status='1' && delete_status='0' ORDER BY id DESC");
	$output .= "<option value=''>Select Voucher Number</option>";
	if(mysqli_num_rows($query) > 0) {
		while($result = mysqli_fetch_assoc($query)) {
			$output .= "<option value='".$result['voucher_number']."'>".people_name($result['people_id'])." - ".employee_id($result['people_id'])." - ".$result['voucher_number']." - ".$result['voucher_date']."</option>";
		}
	}

	echo $output;

}


if(isset($_POST['action']) && $_POST['action'] == 'display_voucher_detail') {
	$voucher_number = strtoupper(strip_tags(mysqli_real_escape_string($conn, $_POST['voucher_number'])));
	$output = '';

	$query = mysqli_query($conn, "SELECT voucher_date, deploy_to, people_id, department_id FROM deploy_assets WHERE voucher_number='$voucher_number' && active_status='1' && delete_status='0' LIMIT 1");
	if(mysqli_num_rows($query) > 0) {
		$result = mysqli_fetch_assoc($query);
		$output .= "<input type='hidden' value='".$result['voucher_date']."' name='voucher_date'>";
		$output .= "<input type='hidden' value='".$result['deploy_to']."' name='deploy_to'>";
		$output .= "<input type='hidden' value='".$result['people_id']."' name='deploy_people'>";
		$output .= "<input type='hidden' value='".$result['department_id']."' name='deploy_department'>";
	}

	echo $output;
}


if(isset($_POST['action']) && $_POST['action'] == 'display_igr_assets') {

	$output = '';
	$igr_number = strtoupper(strip_tags(mysqli_real_escape_string($conn, $_POST['igr_number'])));

	$query = mysqli_query($conn, "SELECT * FROM assets WHERE igr_number='$igr_number' && qty!='0' && active_status='1' && delete_status='0' && parent_id is NULL");
	if(mysqli_num_rows($query) > 0) {

		$output .= "<div class='table-responsive'><table class='table table-striped table-hover'>";

		$i = 1;
		while($result = mysqli_fetch_assoc($query)) {

			$output .= "<tr>";
			$output .= "<td class='col-6'><input type='hidden' name='asset_id[]' value='".$result['id']."'>";
			if($result['asset_type'] == 1) {
				$output .= $result['asset_name']." - ".asset_meta($result['id'], 'brand_name')." - ".asset_meta($result['id'], 'serial_number')." - ".asset_meta($result['id'], 'model_number')."<br>";
				$output .= asset_meta($result['id'], 'processor_detail')." Processor<br>";
				$output .= asset_meta($result['id'], 'power_supply')." Power Supply<br>";
				$computer_query = mysqli_query($conn, "SELECT * FROM assets WHERE parent_id='{$result['id']}' && active_status='1' && delete_status='0'");
				if(mysqli_num_rows($computer_query) > 0) {
					while($computer_result = mysqli_fetch_assoc($computer_query)) {
						if($computer_result['asset_type'] == 2) {
							if($computer_result['asset_category'] == 19) {
								$output .= "RAM - DDR".$computer_result['item_type']." - ".$computer_result['item_size']."GB - ".$computer_result['qty']."x<br>";
							} else if($computer_result['asset_category'] == 20) {
								$output .= $computer_result['item_type']." - ".$computer_result['item_size']."GB - ".$result['qty']."x<br>";
							}
						}
					}
				}
			} else if($result['asset_type'] == 2) {
				if($result['asset_category'] == 1) {
					$output .= asset_meta($result['id'], 'brand_name')." - ".asset_meta($result['id'], 'serial_number')." - ".asset_meta($result['id'], 'model_number')."<br>";
					$printer_query = mysqli_query($conn, "SELECT * FROM assets WHERE parent_id='{$result['id']}' && active_status='1' && delete_status='0'");
					if(mysqli_num_rows($printer_query) > 0) {
						while($printer_result = mysqli_fetch_assoc($printer_query)) {
							if($printer_result['asset_type'] == 2) {
								if($printer_result['asset_category'] == 2) {
									$output .= $printer_result['asset_name']." - ".asset_meta($printer_result['id'], 'brand_name')." - ".asset_meta($printer_result['id'], 'serial_number')." - ".asset_meta($printer_result['id'], 'model_number')."<br>";
								}
							}
						}
					}
				} else if($result['asset_category'] == 2 || $result['asset_category'] == 3 || $result['asset_category'] == 13) {
					$output .= $result['asset_name']." - ".asset_meta($result['id'], 'brand_name')." - ".asset_meta($result['id'], 'serial_number')." - ".asset_meta($result['id'], 'model_number')."<br>";
				} else if($result['asset_category'] == 4) {
					$output .= $result['asset_name']." - ".asset_meta($result['id'], 'brand_name')." - ".asset_meta($result['id'], 'serial_number')." - ".asset_meta($result['id'], 'model_number')." - Dimension: ".$result['item_size']."\"<br>";
				} else if($result['asset_category'] == 5) {
					$output .= $result['asset_name']." - ".$result['item_type']."<br>";
				} else if($result['asset_category'] == 6 || $result['asset_category'] == 7 || $result['asset_category'] == 8 || $result['asset_category'] == 9) {
					$output .= $result['item_type'].$result['asset_name']." - ".asset_meta($result['id'], 'brand_name')." - ".asset_meta($result['id'], 'serial_number')." - ".asset_meta($result['id'], 'model_number')."<br>";
				} else if($result['asset_category'] == 10 || $result['asset_category'] == 11 || $result['asset_category'] == 12) {
					$output .= $result['asset_name']." - ".asset_meta($result['id'], 'brand_name')." - ".asset_meta($result['id'], 'serial_number')." - ".asset_meta($result['id'], 'model_number')." - ".$result['item_type']."<br>";
				} else if($result['asset_category'] == 14 || $result['asset_category'] == 15 || $result['asset_category'] == 16 || $result['asset_category'] == 17 || $result['asset_category'] == 18) {
					$output .= $result['asset_name']."<br>";
				} else if($result['asset_category'] == 19) {
					$output .= "DDR".$result['item_type']." - ".$result['item_size']."GB -".$result['asset_name']." - ".asset_meta($result['id'], 'brand_name')." - ".asset_meta($result['id'], 'serial_number')." - ".asset_meta($result['id'], 'model_number')."<br>";
				} else if($result['asset_category'] == 20) {
					$output .= $result['item_type']." - ".$result['item_size']."GB -".$result['asset_name']." - ".asset_meta($result['id'], 'brand_name')." - ".asset_meta($result['id'], 'serial_number')." - ".asset_meta($result['id'], 'model_number')."<br>";
				}
			}
			$output .= "</td>";
			$output .= "<td class='col-6'><input type='number' class='form-control form-control-border' placeholder='Enter Quantity Maximum ".$result['qty']."' name='asset_qty[]' max='".$result['qty']."'></td>";

			$i++;
		}

		$output .= "</table>";

	} else {
		$output .= "<div class='alert alert-danger'>No Items Left in this IGR ".$igr_number."</div>";
	}

	echo $output;

}


if(isset($_POST['action']) && $_POST['action'] == 'display_check_in_assets') {

	$output = '';
	$voucher_number = strtoupper(strip_tags(mysqli_real_escape_string($conn, $_POST['voucher_number'])));

	if($voucher_number != '' && $voucher_number != 0) {

		$query = mysqli_query($conn, "SELECT * FROM deploy_assets WHERE voucher_number='$voucher_number' && active_status='1' && delete_status='0'");

		if(mysqli_num_rows($query) > 0) {

			$i = 1;
			while($result = mysqli_fetch_assoc($query)) {

				$assets_query = mysqli_query($conn, "SELECT * FROM assets WHERE id='{$result['asset_id']}' && active_status='1' && delete_status='0'");
				$assets_result = mysqli_fetch_assoc($assets_query);

				$output .= "<tr>";
				$output .= "<td>".$assets_result['igr_number']."</td>";
				$output .= "<td class='col-5'>";

				if($assets_result['asset_type'] == 1) {
					$output .= $assets_result['asset_name']." - ".asset_meta($assets_result['id'], 'brand_name')." - ".asset_meta($assets_result['id'], 'serial_number')." - ".asset_meta($assets_result['id'], 'model_number')."<br>";
					$output .= asset_meta($assets_result['id'], 'processor_detail')." Processor<br>";
					$output .= asset_meta($assets_result['id'], 'power_supply')." Power Supply<br>";
					$computer_query = mysqli_query($conn, "SELECT * FROM assets WHERE parent_id='{$assets_result['id']}' && active_status='1' && delete_status='0'");
				} else if($assets_result['asset_type'] == 2) {
					if($assets_result['asset_category'] == 1) {
						$output .= asset_meta($assets_result['id'], 'brand_name')." - ".asset_meta($assets_result['id'], 'serial_number')." - ".asset_meta($assets_result['id'], 'model_number')."<br>";
					} else if($assets_result['asset_category'] == 2 || $assets_result['asset_category'] == 3 || $assets_result['asset_category'] == 13) {
						$output .= $assets_result['asset_name']." - ".asset_meta($assets_result['id'], 'brand_name')." - ".asset_meta($assets_result['id'], 'serial_number')." - ".asset_meta($assets_result['id'], 'model_number')."<br>";
					} else if($assets_result['asset_category'] == 4) {
						$output .= $assets_result['asset_name']." - ".asset_meta($assets_result['id'], 'brand_name')." - ".asset_meta($assets_result['id'], 'serial_number')." - ".asset_meta($assets_result['id'], 'model_number')." - Dimension: ".$assets_result['item_size']."\"<br>";
					} else if($assets_result['asset_category'] == 5) {
						$output .= $assets_result['asset_name']." - ".$assets_result['item_type']."<br>";
					} else if($assets_result['asset_category'] == 6 || $assets_result['asset_category'] == 7 || $assets_result['asset_category'] == 8 || $assets_result['asset_category'] == 9) {
						$output .= $assets_result['item_type'].$assets_result['asset_name']." - ".asset_meta($assets_result['id'], 'brand_name')." - ".asset_meta($assets_result['id'], 'serial_number')." - ".asset_meta($assets_result['id'], 'model_number')."<br>";
					} else if($assets_result['asset_category'] == 10 || $assets_result['asset_category'] == 11 || $assets_result['asset_category'] == 12) {
						$output .= $assets_result['asset_name']." - ".asset_meta($assets_result['id'], 'brand_name')." - ".asset_meta($assets_result['id'], 'serial_number')." - ".asset_meta($assets_result['id'], 'model_number')." - ".$assets_result['item_type']."<br>";
					} else if($assets_result['asset_category'] == 14 || $assets_result['asset_category'] == 15 || $assets_result['asset_category'] == 16 || $assets_result['asset_category'] == 17 || $assets_result['asset_category'] == 18) {
						$output .= $assets_result['asset_name']."<br>";
					} else if($assets_result['asset_category'] == 19) {
						$output .= "DDR".$assets_result['item_type']." - ".$assets_result['item_size']."GB -".$assets_result['asset_name']." - ".asset_meta($assets_result['id'], 'brand_name')." - ".asset_meta($assets_result['id'], 'serial_number')." - ".asset_meta($assets_result['id'], 'model_number')."<br>";
					} else if($assets_result['asset_category'] == 20) {
						$output .= $assets_result['item_type']." - ".$assets_result['item_size']."GB -".$assets_result['asset_name']." - ".asset_meta($assets_result['id'], 'brand_name')." - ".asset_meta($assets_result['id'], 'serial_number')." - ".asset_meta($assets_result['id'], 'model_number')."<br>";
					}
				}

				$output .= "</td>";
				$output .= "<td>";
				if($assets_result['asset_type'] == 2 && $assets_result['asset_category'] == 18) {
					$output .= $result['qty']." Feet";
				} else {
					$output .= $result['qty'];
				}
				$output .= "</td>";
				$output .= "<td class='col-3'><button class='btn btn-primary check_in_btn' data-id='".$result['id']."'>Check In</button></td>";
				$output .= "</tr>";
			}

		} else {
			$output .= "<tr><td colspan='3' class='text-center'>No Asset Found</td></tr>";
		}

	}

	echo $output;

}


if(isset($_POST['action']) && $_POST['action'] == 'display_check_in_form') {

	$output = '';
	$id = strip_tags(mysqli_real_escape_string($conn, $_POST['id']));

	if($id != '' && $id != 0) {

		$query = mysqli_query($conn, "SELECT * FROM deploy_assets WHERE id='$id'");
		if(mysqli_num_rows($query) > 0) {

			$result = mysqli_fetch_assoc($query);

			$output .= "<input type='hidden' value='check_in_assets' name='action'>";
			$output .= "<input type='hidden' value='".$id."' name='id'>";

			$output .= '<div class="mb-3">';
				$output .= '<label>Reason:</label>';
				$output .= '<select class="form-control form-control-border" name="check_in_reason" id="check_in_reason" required>';
					$output .= '<option value="">Select Check In Reason</option>';
					$output .= '<option value="1">Faulty</option>';
					$output .= '<option value="2">Return</option>';
				$output .= '</select>';
			$output .= '</div>';
			$output .= '<div class="mb-3">';
				$output .= '<label>Quantity:</label>';
				$output .= '<input type="number" required class="form-control form-control-border" value="'.$result['qty'].'" placeholder="Enter Check In Quantity" max="'.$result['qty'].'" id="check_in_qty" name="check_in_qty">';
			$output .= '</div>';

		}

	}

	echo $output;

}


if(isset($_POST['action']) && $_POST['action'] == 'check_in_assets') {

	$id = strip_tags(mysqli_real_escape_string($conn, $_POST['id']));
	$check_in_reason = strip_tags(mysqli_real_escape_string($conn, $_POST['check_in_reason']));
	$qty = strip_tags(mysqli_real_escape_string($conn, $_POST['check_in_qty']));

	if($id != '' && $check_in_reason != '' && $qty != '') {

		$check_query = mysqli_query($conn, "SELECT * FROM deploy_assets WHERE id='$id'");
		if(mysqli_num_rows($check_query) > 0) {
			$check_result = mysqli_fetch_assoc($check_query);


			$asset_query = mysqli_query($conn, "SELECT * FROM assets WHERE id='{$check_result['asset_id']}'");

			if(mysqli_num_rows($asset_query) > 0) {

				$asset_result = mysqli_fetch_assoc($asset_query);


				if($check_in_reason == 1) {

					$query = mysqli_query($conn, "INSERT INTO faulty_assets(voucher_number, people_id, asset_id, qty, time_created) VALUES('{$check_result['voucher_number']}', '{$check_result['people_id']}', '{$check_result['asset_id']}', '$qty', '$time_created')");

					if($qty == $check_result['qty']) {

						$delete_query = mysqli_query($conn, "DELETE FROM deploy_assets WHERE id='$id'");

					} else {

						$delete_query = mysqli_query($conn, "UPDATE deploy_assets SET qty=qty-$qty WHERE id='$id'");

					}

					$accessories_query = mysqli_query($conn, "SELECT * FROM deploy_assets WHERE parent_id='$id'");

					if(mysqli_num_rows($accessories_query) > 0) {

						while($accessories_result = mysqli_fetch_assoc($accessories_query)) {

							$update_assets = mysqli_query($conn, "INSERT INTO faulty_assets(voucher_number, people_id, asset_id, qty, time_created) VALUES('{$accessories_result['voucher_number']}', '{$accessories_result['people_id']}', '{$accessories_result['asset_id']}', '{$accessories_result['qty']}', '$time_created')");

							// $update_assets = mysqli_query($conn, "UPDATE assets SET qty=qty+{$accessories_result['qty']}, parent_id=NULL WHERE id='{$accessories_result['asset_id']}'");

							$update_deploy_query = mysqli_query($conn, "DELETE FROM deploy_assets WHERE asset_id='{$accessories_result['asset_id']}'");


						}

					}


				} else if($check_in_reason == 2) {

					$query = mysqli_query($conn, "UPDATE assets SET qty=qty+$qty WHERE id='{$check_result['asset_id']}'");

					if($qty == $check_result['qty']) {

						$delete_query = mysqli_query($conn, "DELETE FROM deploy_assets WHERE id='$id'");

					} else {

						$delete_query = mysqli_query($conn, "UPDATE deploy_assets SET qty=qty-$qty WHERE id='$id'");

					}

					$accessories_query = mysqli_query($conn, "SELECT * FROM deploy_assets WHERE parent_id='$id'");

					if(mysqli_num_rows($accessories_query) > 0) {

						while($accessories_result = mysqli_fetch_assoc($accessories_query)) {

							$update_assets = mysqli_query($conn, "UPDATE assets SET qty=qty+{$accessories_result['qty']} WHERE id='{$accessories_result['asset_id']}'");

							$update_deploy_query = mysqli_query($conn, "DELETE FROM deploy_assets WHERE asset_id='{$accessories_result['asset_id']}'");

						}

					}

				}



			}


			if($qty == $check_result['qty']) {
				$delete_query = mysqli_query($conn, "DELETE FROM deploy_assets WHERE id='$id'");
			} else {
				$delete_query = mysqli_query($conn, "UPDATE deploy_assets SET qty=qty-$qty WHERE id='$id'");
			}

			if($query && $delete_query) {
				echo 2;
			} else {
				echo 1;
			}

		}

	}

}





















?>