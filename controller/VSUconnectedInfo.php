<?php
	$func = $_REQUEST['func'];

	if ($func == 'ajaxYes1') {
		echo '
			<th height="50px">Department Office:</th>
        	<td><input type="text" class="form-control" name="occupation" id="pname" ></td>
		';
	}
	else if ($func == 'ajaxYes2') {
		echo '
			<th height="50px">Office Head:</th>
        	<td><input type="text" class="form-control" name="occupation" id="pname" ></td>
		';
	}
	else if ($func == 'ajaxYes3') {
		echo '
			<th height="50px">Office Address:</th>
        	<td><input type="text" class="form-control" name="occupation" id="pname" ></td>
		';
	}
	else if ($func == 'addSiblings1') {
		echo '
			<td text-align="center">1</td>
			<td style="text-align: center"><input class="form-control"  size="30px" type="text" id="s_name" name="s_name"></td>
			<td>
                <div class="input-group date" data-provide="datepicker" data-date-format="yyyy-mm-dd" data-date-todayHighlight=true data-date-autoclose=true >
                    <input type="text" class="form-control date-picker" id="s_bdate" name="s_bdate" placeholder="yyyy-mm-dd" required>
                    <div class="input-group-addon">
                        <span class="glyphicon glyphicon-th"></span>
                    </div>
                </div>
            </td>
			<td width="50px" style="text-align:center" colspan="2">
		      <a id="add" href="#" onclick="addRow(this.value)" title="add">Add</a>
		    </td>
		';
	}
	else if ($func == 'addRow1') {
		$s_name = $_REQUEST['s_name'];
		$s_bdate = $_REQUEST['s_bdate'];
		echo '<script>alert("'.$s_name.'")</script>'; 
		echo '<script>alert("'.$s_bdate.'")</script>'; 
		echo '
			<td></td>
			<td>'.$s_name.'</td>
			<td>'.$s_bdate.'</td>
			<td width="50px" style="text-align:center">
		      <a id="edit" href="#" title="Edit"><span class="glyphicon glyphicon-edit"></span></a>
		    </td>
		    <td width="50px" style="text-align:center">
		      <a id="delete" title="Delete"><span class="glyphicon glyphicon-remove"></span></a>
		    </td>
		';
	}
	else if ($func == 'addSiblingsNo1') {
		echo '
            	<td></td>
            	<td></td>
            	<td>-</td>
            	<td>-</td>
		';
	}
	else{
		echo '
				<th></th>
            	<td></td>
		';
	}

?>