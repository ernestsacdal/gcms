<!-- Campus Modal -->
<?php
$stid = $_SESSION['stidd'];
?>
<div class="modal fade" id="mdlCampus" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Campus Form</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="stucode.php">
                    <input name="stid" type="text" value="<?php echo $stid ?>" hidden>
                    <div class="form-group col-md-12 mx-auto">
                        <label class="form-label"> Campus </label>
                        <select type="text" name="campus" class="form-control" required>
                            <option value="" selected disabled hidden>Select</option>
                            <option value="Sumacab Main Campus">Sumacab Main Campus</option>
                            <option value="General Tinio Street Campus">General Tinio Street Campus</option>
                            <option value="Atate Campus">Atate Campus</option>
                            <option value="Fort Magsaysay Campus">Fort Magsaysay Campus</option>
                            <option value="Gabaldon Campus">Gabaldon Campus</option>
                            <option value="San Isidro Campus">San Isidro Campus</option>
                        </select>
                    </div>
                    <div class="form-group col-md-12 mx-auto">
                        <label class="form-label"> College </label>
                        <select type="text" name="college" class="form-control" required>
                            <option value="" selected disabled hidden>Select</option>
                            <option value="College of Architecture">College of Architecture</option>
                            <option value="College of Arts and Sciences">College of Arts and Sciences</option>
                            <option value="College of Criminology">College of Criminology</option>
                            <option value="College of Education">College of Education</option>
                            <option value="College of Engineering">College of Engineering</option>
                            <option value="College of Information and Communications Technology">College of Information and Communications Technology</option>
                            <option value="College of Industrial Technology">College of Industrial Technology</option>
                            <option value="College of Management and Business Technology">College of Management and Business Technology</option>
                            <option value="College of Nursing">College of Nursing</option>
                            <option value="College of Public Administration and Disaster Management">College of Public Administration and Disaster Management</option>
                        </select>
                    </div>
                    <div class="form-group col-md-12 mx-auto">
                        <label class="form-label"> Major </label>
                        <input type="text" name="major" class="form-control" placeholder="N/A if none">
                    </div>
                    <div class="form-group col-md-12 mx-auto">
                        <label class="form-label"> Student Type </label>
                        <select type="number" name="type" class="form-control" required>
                            <option value="" selected disabled hidden>Select</option>
                            <option value="New Student">New Student</option>
                            <option value="Continuing(Old)">Continuing(Old)</option>
                            <option value="Returning">Returning</option>
                            <option value="Transferee">Transferee</option>
                            <option value="Shifter">Shifter</option>
                        </select>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" name="btnCampus">Save changes</button>
                </form>
            </div>
        </div>

    </div>
</div>

<!-- Personal Information -->
<div class="modal fade" id="mdlPersonalInformation" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Personal Information</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="stucode.php">
                    <input name="stid" type="text" value="<?php echo $stid ?>" hidden>
                    <div class="form-group col-md-12 mx-auto">
                        <div>
                            <label class="form-label"> Address </label>
                            <input type="text" name="address" class="form-control" required onblur="trimInputValue(this)">
                        </div>
                    </div>
                    <div class="form-group col-md-12 mx-auto">
                        <label class="form-label"> Contact </label>
                        <input type="tel" name="contact" class="form-control" required onblur="trimInputValue(this)">
                    </div>
                    <div class="form-group col-md-12 mx-auto">
                        <label class="form-label"> Sex </label>
                        <select type="text" name="sex" class="form-control" required>
                            <option value="" selected disabled hidden>Sex</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Others">Others</option>
                        </select>
                    </div>
                    <div class="form-group col-md-12 mx-auto">
                        <label class="form-label"> Civil Status </label>
                        <select type="text" name="civil" class="form-control" required>
                            <option value="" selected disabled hidden>Civil Status</option>
                            <option value="Single">Single</option>
                            <option value="Married">Married</option>
                            <option value="Divorced">Divorced</option>
                            <option value="Widowed">Widowed</option>
                            <option value="Separated">Separated</option>

                        </select>
                    </div>
                    <div class="form-group col-md-12 mx-auto">
                        <label class="form-label">Citizenship</label>
                        <input type="text" name="citizen" class="form-control" required onblur="trimInputValue(this)">

                    </div>
                    <div class="form-group col-md-12 mx-auto">
                        <label class="form-label">Weight(kg)</label>
                        <input type="text" name="weight" class="form-control" required onblur="trimInputValue(this)">
                    </div>
                    <div class="form-group col-md-12 mx-auto">
                        <label class="form-label">Height(In)</label>
                        <input type="text" name="height" class="form-control" required onblur="trimInputValue(this)">
                    </div>
                    <div class="form-group col-md-12 mx-auto">
                        <label class="form-label">Religion</label>
                        <input type="text" name="religion" class="form-control" placeholder="N/A if none" required>
                    </div>
                    <div class="form-group col-md-12 mx-auto">
                        <label class="form-label">Blood Type</label>
                        <input type="text" name="blood" class="form-control" placeholder="Optional or N/A " required>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" name="btnPersonal">Save changes</button>
                </form>
            </div>
        </div>

    </div>
</div>

<!-- FAMILY BACKGROUND -->

<div class="modal fade" id="mdlFam" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Family Background Form</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="stucode.php">
                    <input name="stid" type="text" value="<?php echo $stid ?>" hidden>
                    <div class="row">
                        <div class="form-group col-md-6 mx-auto">
                            <label class="form-label">Father's Name</label>
                            <input type="text" name="father" class="form-control" required onblur="trimInputValue(this)">
                        </div>
                        <div class="form-group col-md-6 mx-auto">
                            <label class="form-label">Mother's Name</label>
                            <input type="text" name="mother" class="form-control" required onblur="trimInputValue(this)">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6 mx-auto">
                            <label class="form-label">Education</label>
                            <input type="text" name="feduc" class="form-control" required onblur="trimInputValue(this)">
                        </div>
                        <div class="form-group col-md-6 mx-auto">
                            <label class="form-label">Education</label>
                            <input type="text" name="meduc" class="form-control" required onblur="trimInputValue(this)">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6 mx-auto">
                            <label class="form-label">Occupation</label>
                            <input type="text" name="foccu" class="form-control" required onblur="trimInputValue(this)">
                        </div>
                        <div class="form-group col-md-6 mx-auto">
                            <label class="form-label">Occupation</label>
                            <input type="text" name="moccu" class="form-control" required onblur="trimInputValue(this)">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6 mx-auto">
                            <label class="form-label">Monthly Income</label>
                            <input type="text" name="fincome" class="form-control" required>
                        </div>
                        <div class="form-group col-md-6 mx-auto">
                            <label class="form-label">Monthly Income</label>
                            <input type="text" name="mincome" class="form-control" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6 mx-auto">
                            <label class="form-label">Employer/Business</label>
                            <input type="text" name="fbusiness" class="form-control" required>
                        </div>
                        <div class="form-group col-md-6 mx-auto">
                            <label class="form-label">Employer/Business</label>
                            <input type="text" name="mbusiness" class="form-control" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6 mx-auto">
                            <label class="form-label">Work Address</label>
                            <input type="text" name="fwork" class="form-control" required>
                        </div>
                        <div class="form-group col-md-6 mx-auto">
                            <label class="form-label">Work Address</label>
                            <input type="text" name="mwork" class="form-control" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6 mx-auto">
                            <label class="form-label">Contact</label>
                            <input type="text" name="fcontact" class="form-control" required onblur="trimInputValue(this)">
                        </div>
                        <div class="form-group col-md-6 mx-auto">
                            <label class="form-label">Contact</label>
                            <input type="text" name="mcontact" class="form-control" required onblur="trimInputValue(this)">
                        </div>
                    </div>
                    <hr>
                    <div class="form-group col-md-11 mx-auto">
                        <label class="form-label">No. of Siblings</label>
                        <input type="number" name="sibling" class="form-control" required>
                    </div>
                    <div class="form-group col-md-11 mx-auto">
                        <label class="form-label"> Birth Order </label>
                        <select type="text" name="order" class="form-control" required>
                            <option value="" selected disabled hidden>Birth Order</option>
                            <option value="1st">1st</option>
                            <option value="Middle">Middle</option>
                            <option value="Last">Last</option>
                            <option value="Only Child">Only Child</option>
                        </select>
                    </div>
                    <div class="form-group col-md-11 mx-auto">
                        <label class="form-label">Living Conditions</label>
                        <input type="text" name="cond" class="form-control" required>

                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" name="btnFamily">Save changes</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- SCHOLARSHIP/FINANCIAL ASSISTANCE -->
<div class="modal fade" id="mdlscholarship" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Scholarship/Financial Assistance Form</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="stucode.php">
                    <input name="stid" type="text" value="<?php echo $stid ?>" hidden>
                    <div class="form-group col-md-12 mx-auto">
                        <label class="form-label">Does your family belong to any of the following:</label>
                        <select type="text" name="assist" class="form-control" required>
                            <option value="" selected disabled hidden>Select</option>
                            <option value="4Ps">4Ps</option>
                            <option value="Listahan 2.0">Listahan 2.0</option>
                            <option value="N/A">N/A</option>
                        </select>
                    </div>
                    <div class="form-group col-md-12 mx-auto">
                        <label class="form-label">Grantee</label>
                        <select type="text" name="grantee" class="form-control" required>
                            <option value="" selected disabled hidden>Grantee</option>
                            <option value="StuFAP">StuFAP</option>
                            <option value="ESGP-PA">ESGP-PA</option>
                            <option value="Others">Others</option>
                            <option value="N/A">None</option>
                        </select>
                    </div>
                    <div class="form-group col-md-12 mx-auto">
                        <label class="form-label">Other Assistance</label>
                        <input type="text" name="other" class="form-control" required>

                    </div>
                    <div class="form-group col-md-12 mx-auto">
                        <label class="form-label">Are you a Working Student?</label>
                        <select type="text" name="working" class="form-control" required>
                            <option value="" selected disabled hidden>Select</option>
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                    <div class="form-group col-md-12 mx-auto">
                        <label class="form-label">Are you a Dependent of Solo Parent?</label>
                        <select type="text" name="dependent" class="form-control" required onchange="showDependentId(this.value)">
                            <option value="" selected disabled hidden>Select</option>
                            <option value="No">No</option>
                            <option value="Yes - ID Number: ">Yes, Specify ID No. of Parent</option>
                        </select>
                        <div id="dependent-id" style="display:none">
                            <input type="text" name="dependent_id" class="form-control mt-2" placeholder="Enter ID No. of Parent">
                        </div>
                    </div>
                    <div class="form-group col-md-12 mx-auto">
                        <label class="form-label">Are you a Solo Parent?</label>
                        <select type="text" name="solo" class="form-control" required onchange="showSoloId(this.value)">
                            <option value="" selected disabled hidden>Select</option>
                            <option value="No">No</option>
                            <option value="Yes - ID Number: ">Yes, Specify ID No.</option>
                        </select>
                        <div id="solo-id" style="display:none">
                            <input type="text" name="solo_id" class="form-control mt-2" placeholder="Enter ID No.">
                        </div>
                    </div>
                    <div class="form-group col-md-12 mx-auto">
                        <label class="form-label">Are you a Person With Disability?</label>
                        <select type="text" name="pwd" class="form-control" required onchange="showPwdId(this.value)">
                            <option value="" selected disabled hidden>Select</option>
                            <option value="No">No</option>
                            <option value="Yes - ID Number: ">Yes, Specify ID No.</option>
                        </select>
                        <div id="pwd-id" style="display:none">
                            <input type="text" name="pwd_id" class="form-control mt-2" placeholder="Enter ID No.">
                        </div>
                    </div>
                    <div class="form-group col-md-12 mx-auto">
                        <label class="form-label">Are you a member of any Indigenous Group?</label>
                        <select type="text" name="indi" class="form-control" required onchange="showIndiSpecify(this.value)">
                            <option value="" selected disabled hidden>Select</option>
                            <option value="No">No</option>
                            <option value="Yes - Group name: ">Yes, Specify</option>
                        </select>
                        <div id="indi-specify" style="display:none">
                            <input type="text" name="indi_specify" class="form-control mt-2" placeholder="Enter Indigenous Group Name">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="btnScholarship">Save changes</button>
                </form>
            </div>

        </div>
    </div>
</div>
</div>
<!-- EDUC BG -->
<div class="modal fade" id="mdlEduc" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Education Background Form</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="stucode.php">
                    <input name="stid" type="text" value="<?php echo $stid ?>" hidden>
                    <div class="form-group col-md-12 mx-auto">
                        <label class="form-label">Senior High School</label>
                        <input type="Text" name="shs" class="form-control">
                    </div>
                    <div class="form-group col-md-12 mx-auto">
                        <label class="form-label">Strand</label>
                        <select type="number" name="strand" class="form-control" onchange="toggleTextBox()" required>
                            <option value="" selected disabled hidden>Strand</option>
                            <option value="STEM">STEM</option>
                            <option value="ABM">ABM</option>
                            <option value="GAS">GAS</option>
                            <option value="HUMSS">HUMSS</option>
                            <option value="Other">Other, Specify</option>
                        </select>
                    </div>

                    <div class="form-group col-md-12 mx-auto" id="other-strand" style="display:none;">
                        <label class="form-label">Other Strand, Please Specify:</label>
                        <input type="text" name="other_strand" class="form-control">
                    </div>
                    <div class="form-group col-md-12 mx-auto">
                        <label class="form-label">Year Graduated</label>
                        <input type="date" name="shsGrad" class="form-control" required>
                    </div>
                    <div class="form-group col-md-12 mx-auto">
                        <label class="form-label">Honor Received</label>
                        <input type="text" name="shsHnr" class="form-control" placeholder="N/A if none" required>
                    </div>
                    <hr>
                    <div class="form-group col-md-12 mx-auto">
                        <label class="form-label">Junior High School</label>
                        <input type="text" name="jhs" class="form-control" required>
                    </div>
                    <div class="form-group col-md-12 mx-auto">
                        <label class="form-label">Year Graduated</label>
                        <input type="date" name="jhsGrad" class="form-control" required>
                    </div>
                    <div class="form-group col-md-12 mx-auto">
                        <label class="form-label">Honor Received</label>
                        <input type="text" name="jhsHnr" class="form-control" placeholder="N/A if none" required>
                    </div>
                    <hr>
                    <div class="form-group col-md-12 mx-auto">
                        <label class="form-label">Elementary</label>
                        <input type="text" name="elem" class="form-control" required>
                    </div>
                    <div class="form-group col-md-12 mx-auto">
                        <label class="form-label">Year Graduated</label>
                        <input type="date" name="elemGrad" class="form-control" required>
                    </div>
                    <div class="form-group col-md-12 mx-auto">
                        <label class="form-label">Honor Received</label>
                        <input type="text" name="elemHnr" class="form-control" placeholder="N/A if none" required>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="btnEduc">Save changes</button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>




<!-- Involvement IN arts and SPORTS -->
<div class="modal fade" id="mdlInvolvementInArtsAndSports" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Involvement in Arts and Sports Form</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="card-body">
                <form method="POST" action="stucode.php">
                    <input name="stid" type="text" value="<?php echo $stid ?>" hidden>
                    <div class="form-group col-md-12 mx-auto">
                        <label class="form-label">Special Skills</label>
                        <input type="text" name="skill" class="form-control" placeholder="N/A if none" required>
                    </div>
                    <div class="form-group col-md-12 mx-auto">
                        <label class="form-label">Hobbies</label>
                        <input type="text" name="hob" class="form-control" placeholder="N/A if none" required>
                    </div>
                    <div class="form-group col-md-12 mx-auto">
                        <label class="form-label">Non-Academic Recognition</label>
                        <input type="text" name="recog" class="form-control" placeholder="N/A if none" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="btnSkill">Save changes</button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>

<!-- Training Programs Attended -->
<div class="modal fade" id="mdlTrainingProgramsAttended" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Training Programs Attended Form</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="card-body">
                <form method="POST" action="stucode.php">
                    <input name="stid" type="text" value="<?php echo $stid ?>" hidden>
                    <div class="form-group col-md-12 mx-auto">
                        <label class="form-label">Title of Seminar/Workshop/Short Couse</label>
                        <input type="text" name="seminar" class="form-control" placeholder="N/A if none" required>
                    </div>
                    <div class="form-group col-md-12 mx-auto">
                        <label class="form-label">Inclusive Date</label>
                        <input type="date" name="date" class="form-control">
                    </div>
                    <div class="form-group col-md-12 mx-auto">
                        <label class="form-label">Sponsoring Agency</label>
                        <input type="text" name="agency" class="form-control" placeholder="N/A if none" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="btnTrain">Save changes</button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>

<!-- Socail and Extracurricular Activities -->
<div class="modal fade" id="mdlSocailandExtracurricularActivities" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Social and Extracurricular Activites Form</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="card-body">
                <form method="POST" action="stucode.php">
                    <input name="stid" type="text" value="<?php echo $stid ?>" hidden>
                    <div class="form-group col-md-12 mx-auto">
                        <label class="form-label">Affiliation</label>
                        <input type="text" name="aff" class="form-control" placeholder="N/A if none" required>
                    </div>
                    <div class="form-group col-md-12 mx-auto">
                        <label class="form-label">Position Held</label>
                        <input type="text" name="pos" class="form-control" placeholder="N/A if none" required>
                    </div>
                    <div class="form-group col-md-12 mx-auto">
                        <label class="form-label">Period Covered</label>
                        <input type="text" name="period" class="form-control" placeholder="N/A if none" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="btnExtra">Save changes</button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>

<!-- Socail Media Presence -->
<div class="modal fade" id="mdlSocailMediaPresence" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Social Media Presence Form</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="card-body">
                <form method="POST" action="stucode.php">
                    <input name="stid" type="text" value="<?php echo $stid ?>" hidden>
                    <div class="form-group col-md-12 mx-auto">
                        <label class="form-label">Facebook</label>
                        <input type="Text" name="fb" class="form-control" placeholder="N/A if none" required>
                    </div>
                    <div class="form-group col-md-12 mx-auto">
                        <label class="form-label">Twitter</label>
                        <input type="text" name="twt" class="form-control" placeholder="N/A if none" required>
                    </div>
                    <div class="form-group col-md-12 mx-auto">
                        <label class="form-label">Instagram</label>
                        <input type="text" name="ig" class="form-control" placeholder="N/A if none" required>
                    </div>
                    <div class="form-group col-md-12 mx-auto">
                        <label class="form-label">Youtube</label>
                        <input type="text" name="yt" class="form-control" placeholder="N/A if none" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="btnSocial">Save changes</button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
<!-- 2nd -->
<div class="modal fade" id="mdlCampuss" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Campus Form</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="stucode.php">
                    <input name="stid" type="text" value="<?php echo $stid ?>" hidden>
                    <div class="form-group col-md-12 mx-auto">
                        <label class="form-label"> Campus </label>
                        <select type="text" name="campus" class="form-control" required>
                            <option value="" selected disabled hidden>Select</option>
                            <option value="Sumacab Main Campus">Sumacab Main Campus</option>
                            <option value="General Tinio Street Campus">General Tinio Street Campus</option>
                            <option value="Atate Campus">Atate Campus</option>
                            <option value="Fort Magsaysay Campus">Fort Magsaysay Campus</option>
                            <option value="Gabaldon Campus">Gabaldon Campus</option>
                            <option value="San Isidro Campus">San Isidro Campus</option>
                        </select>
                    </div>
                    <div class="form-group col-md-12 mx-auto">
                        <label class="form-label"> College </label>
                        <select type="text" name="college" class="form-control" required>
                            <option value="" selected disabled hidden>Select</option>
                            <option value="College of Architecture">College of Architecture</option>
                            <option value="College of Arts and Sciences">College of Arts and Sciences</option>
                            <option value="College of Criminology">College of Criminology</option>
                            <option value="College of Education">College of Education</option>
                            <option value="College of Engineering">College of Engineering</option>
                            <option value="College of Information and Communications Technology">College of Information and Communications Technology</option>
                            <option value="College of Industrial Technology">College of Industrial Technology</option>
                            <option value="College of Management and Business Technology">College of Management and Business Technology</option>
                            <option value="College of Nursing">College of Nursing</option>
                            <option value="College of Public Administration and Disaster Management">College of Public Administration and Disaster Management</option>
                        </select>
                    </div>
                 
                    <div class="form-group col-md-12 mx-auto">
                        <label class="form-label"> Major </label>
                        <input type="text" name="major" class="form-control" placeholder="N/A if none">
                    </div>
                    <div class="form-group col-md-12 mx-auto">
                        <label class="form-label"> Student Type </label>
                        <select type="number" name="type" class="form-control" required>
                            <option value="" selected disabled hidden>Select</option>
                            <option value="New Student">New Student</option>
                            <option value="Continuing(Old)">Continuing(Old)</option>
                            <option value="Returning">Returning</option>
                            <option value="Transferee">Transferee</option>
                            <option value="Shifter">Shifter</option>
                        </select>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" name="btnCampuss">Save changes</button>
                </form>
            </div>
        </div>

    </div>
</div>

<!-- Personal Information -->
<div class="modal fade" id="mdlPersonalInformationn" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Personal Information</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="stucode.php">
                    <input name="stid" type="text" value="<?php echo $stid ?>" hidden>
                    <div class="form-group col-md-12 mx-auto">
                        <div>
                            <label class="form-label"> Address </label>
                            <input type="text" name="address" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group col-md-12 mx-auto">
                        <label class="form-label"> Contact </label>
                        <input type="tel" name="contact" class="form-control" required>
                    </div>
                    <div class="form-group col-md-12 mx-auto">
                        <label class="form-label"> Sex </label>
                        <select type="text" name="sex" class="form-control" required>
                            <option value="" selected disabled hidden>Sex</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Others">Others</option>
                        </select>
                    </div>
                    <div class="form-group col-md-12 mx-auto">
                        <label class="form-label"> Civil Status </label>
                        <select type="text" name="civil" class="form-control" required>
                            <option value="" selected disabled hidden>Civil Status</option>
                            <option value="Single">Single</option>
                            <option value="Married">Married</option>
                            <option value="Divorced">Divorced</option>
                            <option value="Widowed">Widowed</option>
                            <option value="Separated">Separated</option>

                        </select>
                    </div>
                    <div class="form-group col-md-12 mx-auto">
                        <label class="form-label">Citizenship</label>
                        <input type="text" name="citizen" class="form-control" required>

                    </div>
                    <div class="form-group col-md-12 mx-auto">
                        <label class="form-label">Weight(kg)</label>
                        <input type="text" name="weight" class="form-control" required>
                    </div>
                    <div class="form-group col-md-12 mx-auto">
                        <label class="form-label">Height(In)</label>
                        <input type="text" name="height" class="form-control" required>
                    </div>
                    <div class="form-group col-md-12 mx-auto">
                        <label class="form-label">Religion</label>
                        <input type="text" name="religion" class="form-control" placeholder="N/A if none" required>
                    </div>
                    <div class="form-group col-md-12 mx-auto">
                        <label class="form-label">Blood Type</label>
                        <input type="text" name="blood" class="form-control" placeholder="Optional or N/A ">
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" name="btnPersonall">Save changes</button>
                </form>
            </div>
        </div>

    </div>
</div>

<!-- FAMILY BACKGROUND -->

<div class="modal fade" id="mdlFamm" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Family Background Form</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="stucode.php">
                    <input name="stid" type="text" value="<?php echo $stid ?>" hidden>
                    <div class="row">
                        <div class="form-group col-md-6 mx-auto">
                            <label class="form-label">Father's Name</label>
                            <input type="text" name="father" class="form-control" required>
                        </div>
                        <div class="form-group col-md-6 mx-auto">
                            <label class="form-label">Mother's Name</label>
                            <input type="text" name="mother" class="form-control" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6 mx-auto">
                            <label class="form-label">Education</label>
                            <input type="text" name="feduc" class="form-control" required>
                        </div>
                        <div class="form-group col-md-6 mx-auto">
                            <label class="form-label">Education</label>
                            <input type="text" name="meduc" class="form-control" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6 mx-auto">
                            <label class="form-label">Occupation</label>
                            <input type="text" name="foccu" class="form-control" required>
                        </div>
                        <div class="form-group col-md-6 mx-auto">
                            <label class="form-label">Occupation</label>
                            <input type="text" name="moccu" class="form-control" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6 mx-auto">
                            <label class="form-label">Monthly Income</label>
                            <input type="text" name="fincome" class="form-control">
                        </div>
                        <div class="form-group col-md-6 mx-auto">
                            <label class="form-label">Monthly Income</label>
                            <input type="text" name="mincome" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6 mx-auto">
                            <label class="form-label">Employer/Business</label>
                            <input type="text" name="fbusiness" class="form-control">
                        </div>
                        <div class="form-group col-md-6 mx-auto">
                            <label class="form-label">Employer/Business</label>
                            <input type="text" name="mbusiness" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6 mx-auto">
                            <label class="form-label">Work Address</label>
                            <input type="text" name="fwork" class="form-control">
                        </div>
                        <div class="form-group col-md-6 mx-auto">
                            <label class="form-label">Work Address</label>
                            <input type="text" name="mwork" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6 mx-auto">
                            <label class="form-label">Contact</label>
                            <input type="text" name="fcontact" class="form-control" required>
                        </div>
                        <div class="form-group col-md-6 mx-auto">
                            <label class="form-label">Contact</label>
                            <input type="text" name="mcontact" class="form-control" required>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group col-md-11 mx-auto">
                        <label class="form-label">No. of Siblings</label>
                        <input type="number" name="sibling" class="form-control" required>
                    </div>
                    <div class="form-group col-md-11 mx-auto">
                        <label class="form-label"> Birth Order </label>
                        <select type="text" name="order" class="form-control" required>
                            <option value="" selected disabled hidden>Birth Order</option>
                            <option value="1st">1st</option>
                            <option value="Middle">Middle</option>
                            <option value="Last">Last</option>
                            <option value="Only Child">Only Child</option>
                        </select>
                    </div>
                    <div class="form-group col-md-11 mx-auto">
                        <label class="form-label">Living Conditions</label>
                        <input type="text" name="cond" class="form-control" required>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" name="btnFamilyy">Save changes</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- SCHOLARSHIP/FINANCIAL ASSISTANCE -->
<div class="modal fade" id="mdlscholarshipp" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Scholarship/Financial Assistance Form</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="stucode.php">
                    <input name="stid" type="text" value="<?php echo $stid ?>" hidden>
                    <div class="form-group col-md-12 mx-auto">
                        <label class="form-label">Does your family belong to any of the following:</label>
                        <select type="text" name="assist" class="form-control" required>
                            <option value="" selected disabled hidden>Select</option>
                            <option value="4Ps">4Ps</option>
                            <option value="Listahan 2.0">Listahan 2.0</option>
                            <option value="N/A">N/A</option>
                        </select>
                    </div>
                    <div class="form-group col-md-12 mx-auto">
                        <label class="form-label">Grantee</label>
                        <select type="text" name="grantee" class="form-control" required>
                            <option value="" selected disabled hidden>Grantee</option>
                            <option value="StuFAP">StuFAP</option>
                            <option value="ESGP-PA">ESGP-PA</option>
                            <option value="Others">Others</option>
                        </select>
                    </div>
                    <div class="form-group col-md-12 mx-auto">
                        <label class="form-label">Are you a Working Student?</label>
                        <select type="text" name="working" class="form-control" required>
                            <option value="" selected disabled hidden>Select</option>
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                    <div class="form-group col-md-12 mx-auto">
                        <label class="form-label">Are you a Dependent of Solo Parent?</label>
                        <select type="text" name="dependent" class="form-control" required onchange="showDependentId(this.value)">
                            <option value="" selected disabled hidden>Select</option>
                            <option value="No">No</option>
                            <option value="Yes - ID Number: ">Yes, Specify ID No. of Parent</option>
                        </select>
                        <div id="dependent-id" style="display:none">
                            <input type="text" name="dependent_id" class="form-control mt-2" placeholder="Enter ID No. of Parent">
                        </div>
                    </div>
                    <div class="form-group col-md-12 mx-auto">
                        <label class="form-label">Are you a Solo Parent?</label>
                        <select type="text" name="solo" class="form-control" required onchange="showSoloId(this.value)">
                            <option value="" selected disabled hidden>Select</option>
                            <option value="No">No</option>
                            <option value="Yes - ID Number: ">Yes, Specify ID No.</option>
                        </select>
                        <div id="solo-id" style="display:none">
                            <input type="text" name="solo_id" class="form-control mt-2" placeholder="Enter ID No.">
                        </div>
                    </div>
                    <div class="form-group col-md-12 mx-auto">
                        <label class="form-label">Are you a Person With Disability?</label>
                        <select type="text" name="pwd" class="form-control" required onchange="showPwdId(this.value)">
                            <option value="" selected disabled hidden>Select</option>
                            <option value="No">No</option>
                            <option value="Yes - ID Number: ">Yes, Specify ID No.</option>
                        </select>
                        <div id="pwd-id" style="display:none">
                            <input type="text" name="pwd_id" class="form-control mt-2" placeholder="Enter ID No.">
                        </div>
                    </div>
                    <div class="form-group col-md-12 mx-auto">
                        <label class="form-label">Are you a member of any Indigenous Group?</label>
                        <select type="text" name="indi" class="form-control" required onchange="showIndiSpecify(this.value)">
                            <option value="" selected disabled hidden>Select</option>
                            <option value="No">No</option>
                            <option value="Yes - Group name: ">Yes, Specify</option>
                        </select>
                        <div id="indi-specify" style="display:none">
                            <input type="text" name="indi_specify" class="form-control mt-2" placeholder="Enter Indigenous Group Name">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="btnScholarshipp">Save changes</button>
                </form>
            </div>

        </div>
    </div>
</div>
</div>
<!-- EDUC BG -->
<div class="modal fade" id="mdlEducc" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Education Background Form</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="stucode.php">
                    <input name="stid" type="text" value="<?php echo $stid ?>" hidden>
                    <div class="form-group col-md-12 mx-auto">
                        <label class="form-label">Senior High School</label>
                        <input type="Text" name="shs" class="form-control">
                    </div>
                    <div class="form-group col-md-12 mx-auto">
                        <label class="form-label">Strand</label>
                        <select type="number" name="strand" class="form-control" onchange="toggleTextBox()" required>
                            <option value="" selected disabled hidden>Strand</option>
                            <option value="STEM">STEM</option>
                            <option value="ABM">ABM</option>
                            <option value="GAS">GAS</option>
                            <option value="HUMSS">HUMSS</option>
                            <option value="Other">Other, Specify</option>
                        </select>
                    </div>

                    <div class="form-group col-md-12 mx-auto" id="other-strand" style="display:none;">
                        <label class="form-label">Other Strand, Please Specify:</label>
                        <input type="text" name="other_strand" class="form-control">
                    </div>
                    <div class="form-group col-md-12 mx-auto">
                        <label class="form-label">Year Graduated</label>
                        <input type="date" name="shsGrad" class="form-control">
                    </div>
                    <div class="form-group col-md-12 mx-auto">
                        <label class="form-label">Honor Received</label>
                        <input type="text" name="shsHnr" class="form-control" placeholder="N/A if none">
                    </div>
                    <hr>
                    <div class="form-group col-md-12 mx-auto">
                        <label class="form-label">Junior High School</label>
                        <input type="text" name="jhs" class="form-control">
                    </div>
                    <div class="form-group col-md-12 mx-auto">
                        <label class="form-label">Year Graduated</label>
                        <input type="date" name="jhsGrad" class="form-control">
                    </div>
                    <div class="form-group col-md-12 mx-auto">
                        <label class="form-label">Honor Received</label>
                        <input type="text" name="jhsHnr" class="form-control" placeholder="N/A if none">
                    </div>
                    <hr>
                    <div class="form-group col-md-12 mx-auto">
                        <label class="form-label">Elementary</label>
                        <input type="text" name="elem" class="form-control">
                    </div>
                    <div class="form-group col-md-12 mx-auto">
                        <label class="form-label">Year Graduated</label>
                        <input type="date" name="elemGrad" class="form-control">
                    </div>
                    <div class="form-group col-md-12 mx-auto">
                        <label class="form-label">Honor Received</label>
                        <input type="text" name="elemHnr" class="form-control" placeholder="N/A if none">
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="btnEducc">Save changes</button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>




<!-- Involvement IN arts and SPORTS -->
<div class="modal fade" id="mdlInvolvementInArtsAndSportss" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Involvement in Arts and Sports Form</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="card-body">
                <form method="POST" action="stucode.php">
                    <input name="stid" type="text" value="<?php echo $stid ?>" hidden>
                    <div class="form-group col-md-12 mx-auto">
                        <label class="form-label">Special Skills</label>
                        <input type="text" name="skill" class="form-control" placeholder="N/A if none">
                    </div>
                    <div class="form-group col-md-12 mx-auto">
                        <label class="form-label">Hobbies</label>
                        <input type="text" name="hob" class="form-control" placeholder="N/A if none">
                    </div>
                    <div class="form-group col-md-12 mx-auto">
                        <label class="form-label">Non-Academic Recognition</label>
                        <input type="text" name="recog" class="form-control" placeholder="N/A if none">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="btnSkilll">Save changes</button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>

<!-- Training Programs Attended -->
<div class="modal fade" id="mdlTrainingProgramsAttendedd" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Training Programs Attended Form</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="card-body">
                <form method="POST" action="stucode.php">
                    <input name="stid" type="text" value="<?php echo $stid ?>" hidden>
                    <div class="form-group col-md-12 mx-auto">
                        <label class="form-label">Title of Seminar/Workshop/Short Couse</label>
                        <input type="text" name="seminar" class="form-control" placeholder="N/A if none">
                    </div>
                    <div class="form-group col-md-12 mx-auto">
                        <label class="form-label">Inclusive Date</label>
                        <input type="date" name="date" class="form-control">
                    </div>
                    <div class="form-group col-md-12 mx-auto">
                        <label class="form-label">Sponsoring Agency</label>
                        <input type="text" name="agency" class="form-control" placeholder="N/A if none">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="btnTrainn">Save changes</button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>

<!-- Socail and Extracurricular Activities -->
<div class="modal fade" id="mdlSocailandExtracurricularActivitiess" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Social and Extracurricular Activites Form</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="card-body">
                <form method="POST" action="stucode.php">
                    <input name="stid" type="text" value="<?php echo $stid ?>" hidden>
                    <div class="form-group col-md-12 mx-auto">
                        <label class="form-label">Affiliation</label>
                        <input type="text" name="aff" class="form-control" placeholder="N/A if none">
                    </div>
                    <div class="form-group col-md-12 mx-auto">
                        <label class="form-label">Position Held</label>
                        <input type="text" name="pos" class="form-control" placeholder="N/A if none">
                    </div>
                    <div class="form-group col-md-12 mx-auto">
                        <label class="form-label">Period Covered</label>
                        <input type="text" name="period" class="form-control" placeholder="N/A if none">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="btnExtraa">Save changes</button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>

<!-- Socail Media Presence -->
<div class="modal fade" id="mdlSocailMediaPresencee" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Social Media Presence Form</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="card-body">
                <form method="POST" action="stucode.php">
                    <input name="stid" type="text" value="<?php echo $stid ?>" hidden>
                    <div class="form-group col-md-12 mx-auto">
                        <label class="form-label">Facebook</label>
                        <input type="Text" name="fb" class="form-control" placeholder="N/A if none">
                    </div>
                    <div class="form-group col-md-12 mx-auto">
                        <label class="form-label">Twitter</label>
                        <input type="text" name="twt" class="form-control" placeholder="N/A if none">
                    </div>
                    <div class="form-group col-md-12 mx-auto">
                        <label class="form-label">Instagram</label>
                        <input type="text" name="ig" class="form-control" placeholder="N/A if none">
                    </div>
                    <div class="form-group col-md-12 mx-auto">
                        <label class="form-label">Youtube</label>
                        <input type="text" name="yt" class="form-control" placeholder="N/A if none">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="btnSociall">Save changes</button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>

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
                <form method="POST" action="stucode.php">
                    <?php
                    $stid = $_SESSION['stidd'];
                    $sql = "SELECT * FROM student WHERE stid = '$stid'";
                    $result = mysqli_query($link, $sql);
                    $row = mysqli_fetch_assoc($result);

                    $sqls = "SELECT * FROM personal WHERE stid = '$stid'";
                    $results = mysqli_query($link, $sqls);
                    $rows = mysqli_fetch_assoc($results);
                    ?>
                    <div class="row">
                        <input name="stid" type="text" value="<?php echo $stid ?>" hidden>
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
                            <label class="form-label">Course</label>
                            <input type="text" name="course" class="form-control" required onblur="trimInputValue(this)" value="<?= $row['course'] ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6 mx-auto">
                            <label class="form-label">Year Level</label>
                            <input type="text" name="level" class="form-control" required onblur="trimInputValue(this)" value="<?= $row['year'] ?>">
                        </div>
                        <div class="form-group col-md-6 mx-auto">
                            <label class="form-label">Section</label>
                            <input type="Text" name="section" class="form-control" value="<?= $row['section'] ?>" required onblur="trimInputValue(this)">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6 mx-auto">
                            <label class="form-label">Birth Date</label>
                            <input type="text" name="bdate" class="form-control" required onblur="trimInputValue(this)" value="<?= $row['bdate'] ?>">
                        </div>
                        <div class="form-group col-md-6 mx-auto">
                            <label class="form-label">Phone</label>
                            <input type="text" name="phone" class="form-control" value="<?= $rows['contact'] ?>" required onblur="trimInputValue(this)">
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

<!-- Edit Info Modal -->
<div class="modal fade" id="btnEditt" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Personal Information Form</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="stucode.php">
                    <?php
                    $stid = $_SESSION['stidd'];
                    $sql = "SELECT * FROM student WHERE stid = '$stid'";
                    $result = mysqli_query($link, $sql);
                    $row = mysqli_fetch_assoc($result);

                    $sqls = "SELECT * FROM personal WHERE stid = '$stid'";
                    $results = mysqli_query($link, $sqls);
                    $rows = mysqli_fetch_assoc($results);
                    ?>
                    <div class="row">
                        <input name="stid" type="text" value="<?php echo $stid ?>" hidden>
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
                            <label class="form-label">Course</label>
                            <input type="text" name="course" class="form-control" required onblur="trimInputValue(this)" value="<?= $row['course'] ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6 mx-auto">
                            <label class="form-label">Year Level</label>
                            <input type="text" name="level" class="form-control" required onblur="trimInputValue(this)" value="<?= $row['year'] ?>">
                        </div>
                        <div class="form-group col-md-6 mx-auto">
                            <label class="form-label">Section</label>
                            <input type="Text" name="section" class="form-control" value="<?= $row['section'] ?>" required onblur="trimInputValue(this)">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6 mx-auto">
                            <label class="form-label">Birth Date</label>
                            <input type="text" name="bdate" class="form-control" required onblur="trimInputValue(this)" value="<?= $rows['birth'] ?>">
                        </div>
                        <div class="form-group col-md-6 mx-auto">
                            <label class="form-label">Phone</label>
                            <input type="text" name="phone" class="form-control" value="<?= $rows['contact'] ?>" required onblur="trimInputValue(this)">
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" name="btnEditt">Save changes</button>
                </form>
            </div>
        </div>
    </div>
</div>




<!-- Modal -->
<div class="modal fade" id="mdlRoutine" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="stucode.php">
                    <input name="stid" type="text" value="<?php echo $stid ?>" hidden>
                    <h5>Would you like to submit a request to unlock the routine form?</h5>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                <button type="submit" class="btn btn-success" name="btnYes">Yes</button>
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
                <form method="POST" action="stucode.php" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Upload a photo</label>
                        <input name="stid" type="text" value="<?php echo $stid ?>" hidden>

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


<!-- Modal for Delete -->

<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->