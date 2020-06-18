<!-- ===============================================Add Educational Background======================== -->
<div class="modal fade" id="addEB" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add Educational Background</h4>
            </div>
            <div class="modal-body">
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <form action="../controller/connect.php?func=addLastSchool" name="myForm" method='POST'>
                            <table border='0' width='100%'>
                                <tr>
                                    <th height='50px'>Degree:</th>
                                    <td><input type="text" class="form-control" name="degree" id="degree" required></td>
                                </tr>
                                <tr>
                                    <th height='50px'>School Graduated:</th>
                                    <td><input type="text" class="form-control" name="school" id="school" required></td>
                                </tr>
                                <tr>
                                    <th>Length of Service</th>
                                </tr>
                                <tr>
                                    <th height='50px'>Year Started:</th>
                                    <td><input type="text" class="form-control" name="yrstart" id="yrstart" required></td>
                                </tr>
                                <tr>
                                    <th height='50px'>Year End:</th>
                                    <td><input type="text" class="form-control" name="yrend" id="yrend" required></td>
                                </tr>
                            </table>
                            <br>
                            <center><button type="submit" class="btn btn-success" name="addEB">Add</button></center>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ===============================================Add Service Record======================== -->
<div class="modal fade" id="upSR" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add Service Record</h4>
            </div>
            <div class="modal-body">
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <form action="../controller/connect.php?func=addLastSchool" name="myForm" method='POST'>
                            <table border='0' width='100%'>
                                <tr>
                                    <th height='50px'>Date Started:</th>
                                    <td><input type="text" class="form-control" name="date_started" id="date_started" required></td>
                                </tr>
                                <tr>
                                    <th height='50px'>Postion:</th>
                                    <td><input type="text" class="form-control" name="postion" id="position" required></td>
                                </tr>
                                 <tr>
                                    <th height='50px'>Monthly Salary:</th>
                                    <td><input type="text" class="form-control" name="postion" id="position" required></td>
                                </tr>
                                
                            </table>
                            <br>
                            <center><button type="submit" class="btn btn-success" name="addSR">Add</button></center>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>