<!-- Modal for Delete -->
<div class="modal fade" id="mdlDocu" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Warning</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="councode.php" method="POST">
                <div class="modal-body">
                    <?php
                    $uname = $_SESSION['uname'];
                    ?>
                    <input type="hidden" name="uname" value="<?php echo $uname ?>">
                    <input type="hidden" name="docuID" id="docuID">
                    <input type="hidden" name="docstID" id="docstID">

                    <div class="form-group col-md-12 mx-auto">
                        <label class="form-label">Reason</label>
                        <textarea type="text" name="reject" class="form-control" required>
                        </textarea>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="btnRejDoc" class="btn btn-danger">Confirm</button>
            </form>
        </div>
    </div>
</div>
</div>

<!-- Modal for Accept -->
<div class="modal fade" id="mdlDocuAcc" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Approval Form</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="councode.php" method="POST">
                <?php
                $uname = $_SESSION['uname'];
                ?>
                <input type="hidden" name="uname" value="<?php echo $uname ?>">
                <div class="modal-body">
                    <input type="hidden" name="docuIDAcc" id="docuIDAcc">
                    <input type="hidden" name="docAstID" id="docAstID">

                    <div class="form-group col-md-12 mx-auto">
                        <label class="form-label">Pickup Date </label>
                        <input type="date" name="accept" class="form-control" required>
                    </div>

                    <div class="form-group col-md-12 mx-auto">
                        <label class="form-label">Report(Optional) </label>
                        <input type="text" name="repAcc" class="form-control">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="btnAccDoc" class="btn btn-success">Confirm</button>
            </form>
        </div>
    </div>
</div>
</div>

<!-- Modal for Delete -->
<div class="modal fade" id="mdlApp" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Warning</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="councode.php" method="POST">
                <?php
                $uname = $_SESSION['uname'];
                ?>
                <input type="hidden" name="uname" value="<?php echo $uname ?>">
                <div class="modal-body">
                    <input type="hidden" name="appID" id="appID">
                    <input type="hidden" name="appstIDR" id="appstIDR">
                </div>
                <div class="form-group col-md-12 mx-auto">
                <h5>Are you sure you want to reject the appointment request?</h5>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="btnRejApp" class="btn btn-danger">Confirm</button>
            </form>
        </div>
    </div>
</div>
</div>

<!-- Modal for Accept -->
<div class="modal fade" id="mdlAppAcc" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Approval Form</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="councode.php" method="POST">
                <?php
                $uname = $_SESSION['uname'];
                ?>
                <input type="hidden" name="uname" value="<?php echo $uname ?>">
                <div class="modal-body">
                    <input type="hidden" name="appIDAcc" id="appIDAcc">
                    <input type="hidden" name="appstIDA" id="appstIDA">
                    <input type="hidden" name="avid" id="avid">
                    <div class="form-group col-md-12 mx-auto">
                <h5>Are you sure you want to accept the appointment request?</h5>
                </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="btnAccApp" class="btn btn-success">Confirm</button>
            </form>
        </div>
    </div>
</div>
</div>

<!-- prof picModal -->
<div class="modal fade" id="mdlPp" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="councode.php" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Upload a photo</label>
                        <input name="uname" type="text" value="<?php echo $uname ?>" hidden>

                        <input class="form-control" name="img" type="file" id="formFile" onchange="previewImage()">
                        <br>
                        <img src="" id="preview" style="display:none;height:100px;border-radius:50%; margin: auto;">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="upload" class="btn btn-primary">Save changes</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function previewImage() {
        var preview = document.querySelector('#preview');
        var file = document.querySelector('#formFile').files[0];
        var reader = new FileReader();

        reader.onloadend = function() {
            preview.src = reader.result;
            preview.style.display = "block";
        }

        if (file) {
            reader.readAsDataURL(file);
        } else {
            preview.src = "";
        }
    }
</script>


<!-- Edit Info Modal -->
<div class="modal fade" id="btnEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Personal Information Form</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="councode.php">
                    <?php
                    $uname = $_SESSION['uname'];
                    $sql = "SELECT * FROM counselor WHERE uname = '$uname'";
                    $result = mysqli_query($link, $sql);
                    $row = mysqli_fetch_assoc($result);

                    ?>
                    <div class="form-group col-md-13 mx-auto">
                        <label class="form-label">Username</label>
                        <input type="text" name="uname" class="form-control" required onblur="trimInputValue(this)" value="<?= $row['uname'] ?> ">
                    </div>
                    <div class="row">
                        <input name="uname" type="text" value="<?php echo $uname ?>" hidden>
                        <div class="form-group col-md-6 mx-auto">
                            <label class="form-label">First Name</label>
                            <input type="text" name="fname" class="form-control" required onblur="trimInputValue(this)" value="<?= $row['fname'] ?> ">
                        </div>
                        <div class="form-group col-md-6 mx-auto">
                            <label class="form-label">Last Name</label>
                            <input type="text" name="lname" class="form-control" required onblur="trimInputValue(this)" value="<?= $row['lname'] ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6 mx-auto">
                            <label class="form-label">Email</label>
                            <input type="Text" name="email" class="form-control" value="<?= $row['email'] ?>" required onblur="trimInputValue(this)">
                        </div>
                        <div class="form-group col-md-6 mx-auto">
                            <label class="form-label">Position</label>
                            <input type="text" name="position" class="form-control" required onblur="trimInputValue(this)" value="<?= $row['position'] ?>">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6 mx-auto">
                            <label class="form-label">Birth Date</label>
                            <input type="text" name="bdate" class="form-control" required onblur="trimInputValue(this)" value="<?= $row['bdate'] ?>">
                        </div>
                        <div class="form-group col-md-6 mx-auto">
                            <label class="form-label">Phone</label>
                            <input type="text" name="contact" class="form-control" value="<?= $row['contact'] ?>" required onblur="trimInputValue(this)">
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" name="btnEdit">Save changes</button>
                </form>
            </div>
        </div>
    </div>
</div>