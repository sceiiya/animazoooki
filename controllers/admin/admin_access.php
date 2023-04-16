<div class="tab-content">
  <div class="tab-pane fade show active" id="pills-login" role="tabpanel" aria-labelledby="tab-login">
    <form>
      <div class="text-center mb-3">
        <p>ADD NEW ADMIN</p>
      </div>
      <!-- Name input -->
      <div class="form-outline mb-4">
        <input type="text" id="AdminFirstName" class="form-control" placeholder="First Name"/>
      </div>

      <div class="form-outline mb-4">
        <input type="text" id="AdminLastName" class="form-control" placeholder="Last Name"/>
      </div>

      <!-- Username input -->
      <div class="form-outline mb-4">
        <input type="text" id="AdminUsername" class="form-control" placeholder="Username"/>
      </div>

      <!-- Email input -->
      <div class="form-outline mb-4">
        <input type="email" id="AdminEmail" class="form-control" placeholder="Email"/>
      </div>

      <!-- Potsition -->
      <div class="form-outline mb-4">
          <!-- <label>Position</label> -->
          <select id="AdminPosition" name="Position">
            <option selected disabled>Access Level</option>
            <option value="agent">Agent</option>
            <option value="supervisor">Supervisor</option>
            <option value="systemadmin">System Admin</option>
          </select>
      </div>

      <!-- Submit button -->
    </form>
    <button type="submit" class="btn btn-info btn-block mb-4" id="addNewAdmin">Add Admin</button>
  </div>
 
</div>