<?php
include '../classes/Users.php';
$Users = new Users();
$id  = filter_input(INPUT_GET, 'i');
$Users->loadValue($id);
?>

<p>Name : <?php echo $Users->getName();?><br/>
    Phone No :<?php echo $Users->getMobileNo();?><br/>
    Email : <?php echo $Users->getEmail();?><br/>
</p>

<div class="preview-elements">
                                                        <form class="form-inline">
                                                            <label class="mr-sm-2" for="inlineFormCustomSelectPref">UPDATE ROLE</label>
                                                            <select class="custom-select mb-4 mr-sm-2" id="inlineFormCustomSelectPref">
                                                                <option value="A">USER</option>
                                                                <option value="U">ADMIN</option>
                                                            </select>


                                                            <button type="submit" class="btn btn-primary fuse-ripple-ready" id="UpdateRole">UPDATE</button>
                                                        </form>

                                                    </div>

