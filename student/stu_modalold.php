<!-- Campus Modal -->
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
                    <div class="form-group col-md-12 mx-auto">
                        <label class="form-label"> Campus </label>
                        <select type="text" name="campus" class="form-control" required>
                            <option value="" selected disabled hidden>Campus</option>
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
                            <option value="" selected disabled hidden>College</option>
                            <option value="Bachelor of Elementary Education">Bachelor of Elementary Education</option>
                            <option value="Bachelor of Hospitality Management">Bachelor of Hospitality Management</option>
                            <option value="Bachelor of Hotel and Restaurant Management">Bachelor of Hotel and Restaurant Management</option>
                            <option value="Bachelor of Industrial Education">Bachelor of Industrial Education</option>
                            <option value="Bachelor of Information Technology">Bachelor of Information Technology</option>
                            <option value="Bachelor of Physical Education">Bachelor of Physical Education</option>
                            <option value="Bachelor of Science in Business Administration">Bachelor of Science in Business Administration</option>
                            <option value="Bachelor of Science in Entrepreneurship">Bachelor of Science in Entrepreneurship</option>
                            <option value="Bachelor of Science in Secondary Education">Bachelor of Science in Secondary Education</option>
                            <option value="Bachelor of Science in Agriculture">Bachelor of Science in Agriculture</option>
                        </select>
                    </div>
                    <div class="form-group col-md-12 mx-auto">
                        <label class="form-label"> Course</label>
                        <select type="text" name="course" class="form-control" required>
                            <option value="" selected disabled hidden>Courses</option>
                            <option value="Bachelor of Elementary Education">Bachelor of Elementary Education</option>
                            <option value="Bachelor of Physical Education">Bachelor of Physical Education</option>
                            <option value="Bachelor of Secondary Education">Bachelor of Secondary Education</option>
                            <option value="Bachelor of Technology and Livelihood Education">Bachelor of Technology and Livelihood Education</option>
                            <option value="Bachelor of Science in Industrial Education">Bachelor of Science in Industrial Education</option>
                            <option value="Bachelor of Science in Physical Education">Bachelor of Science in Physical Education</option>
                            <option value="Bachelor of Special Needs Education with specialization in Early Childhood Education">Bachelor of Special Needs Education with specialization in Early Childhood Education</option>
                            <option value="Certificate in Professional Teacher Education">Certificate in Professional Teacher Education</option>
                            <option value="Bachelor of Science in Civil Engineering">Bachelor of Science in Civil Engineering</option>
                            <option value="Bachelor of Science in Electrical Engineering">Bachelor of Science in Electrical Engineering</option>
                            <option value="Bachelor of Science in Mechanical Engineering">Bachelor of Science in Mechanical Engineering</option>
                            <option value="Bachelor of Science in Information Technology">Bachelor of Science in Information Technology</option>
                            <option value="Bachelor of Science in Business Administration">Bachelor of Science in Business Administration</option>
                            <option value="Bachelor of Science in Entrepreneurship">Bachelor of Science in Entrepreneurship</option>
                            <option value="Bachelor of Science in Hospitality Management">Bachelor of Science in Hospitality Management</option>
                            <option value="Bachelor of Science in Hotel and Restaurant Management">Bachelor of Science in Hotel and Restaurant Management</option>
                            <option value="Bachelor of Science in Tourism Management">Bachelor of Science in Tourism Management</option>
                            <option value="Bachelor of Public Administration">Bachelor of Public Administration</option>
                            <option value="Bachelor of Public Administration Major in Disaster Management">Bachelor of Public Administration Major in Disaster Management</option>
                        </select>
                    </div>
                    <div class="form-group col-md-12 mx-auto">
                        <label class="form-label"> Major </label>
                        <input type="text" name="campus" class="form-control">
                    </div>
                    <div class="form-group col-md-12 mx-auto">
                        <label class="form-label"> Student Type </label>
                        <select type="number" name="college" class="form-control" required>
                            <option value="" selected disabled hidden>Student Type</option>
                            <option value="New Student">New Student</option>
                            <option value="Continuing(Old)">Continuing(Old)</option>
                            <option value="Returning">Returning</option>
                            <option value="Transferee">Transferee</option>
                            <option value="Shifter">Shifter</option>
                        </select>
                    </div>
                    <div class="form-group col-md-12 mx-auto">
                        <label class="form-label"> Year Level</label>
                        <select type="text" class="form-control form-control-user" name="year" id="year">
                            <option value="" selected disabled hidden>Year Level</option>
                            <option value="1st Year">1st Year</option>
                            <option value="2nd Year">2nd Year</option>
                            <option value="3rd Year">3rd Year</option>
                            <option value="4th Year">4th Year</option>
                            <option value="5th Year">5th Year</option>
                        </select>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->