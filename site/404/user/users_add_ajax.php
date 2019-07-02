<div class="wrapper"> <h4 class="m-t-none">Add New Users</h4> 
    <form action="user_add.php"  method="post" id="fuser" role="form">
                <div class="form-group"> <label>Email (required)</label>
                    <input type="text" name="EMAIL" id="email" placeholder="Email" class="input-sm form-control"> </div>
                <div class="form-group"> <label>First Name</label>
                    <input type="text" name="FNAME" id="fname" placeholder="First name" class="input-sm form-control"> </div>
                <div class="form-group"> <label>Last Name</label>
                    <input type="text" name="LNAME" id="lname" placeholder="Last name" class="input-sm form-control"> </div>
                <div class="form-group"> <label>Password</label>
                    <input type="text" name="PASS" id="pass" placeholder="Password" class="input-sm form-control"> </div>
                <div class="form-group"> <label>Role</label> 
                    <select name="ROLE" id="role" class="form-control">
                    <option class="form-control" value='user'>User</option>
        <option value='student'>Student</option>
        <option value='subscriber'>Subscriber</option>
	<option value="contributor">Contributor</option>
	<option value="author">Author</option>
	<option value="editor">Editor</option>
	<option value="admin">Administrator</option>			
                                                 </select> </div>
                
                    <div class="m-t-lg"><input type="submit" id="adduser" value="Add User" class="btn btn-primary btn-block"></div> 
                </form> </div>