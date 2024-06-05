<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create API User</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
    font-family: Arial, sans-serif;
    background-color: #f5f5f5;
    margin: 0;
    padding: 0;
}

.container {
    width: 80%;
    max-width: 900px;
    margin: 20px auto;
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h1 {
    font-size: 24px;
    margin-bottom: 20px;
}

.section {
    margin-bottom: 20px;
}

h2 {
    font-size: 20px;
    /* margin-bottom: 10px; */
}

label {
    display: block;
    font-weight: bold;
    margin-bottom: 5px;
}

input[type="text"],
textarea {
    width: 50%;
    padding: 8px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    /* margin-left: 28%; */
}

textarea {
    height: 100px;
  
}

.radio-group,
.checkbox-group {
    display: flex;
    flex-wrap: wrap;
}

.radio-group label,
.checkbox-group label {
    flex: 1 1 30%;
    margin-right: 10px;
}

.buttons {
    display: flex;
    justify-content: flex-end;
}

/* button {
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
} */

button.cancel {
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    background-color: #ccc;
    margin-right: 10px;
}

button.save {
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    background-color: #4CAF50;
    color: #fff;
}

.first{
    background-color: lightgray;
    border-radius: 20px;
}

.second{
    background-color: lightgray;
    border-radius: 20px;
}

.third{
    background-color: lightgray;
    border-radius: 20px;
}

.fourth{
    background-color: lightgray;
    border-radius: 20px;
}


.checkbox-group {
    display: flex;
    flex-direction: column;
    justify-content: center;
    padding-left: 35%;
    /* padding-top: 10px; */
}

.radio-group{
    display: flex;
    flex-direction: column;
    justify-content: center;
    padding-left: 35%;
}

.button-select-all{
    border: none;
    border-radius: 5px;
    cursor: pointer;
    margin-left: 20px;
}

.access-type{
    padding-left: 23%;
}

/* .textarea{
    padding-left: 35%;
} */

.name{
    display:inline;
    padding-left: 23%;
}

.name1{
    display:inline;
    padding-left: 30%;
}

.whitelist{
    padding-left: 14%;
}

    </style>
</head>


<body>
    <div class="container">
        <form method="post" action="/api-form" id="api-user-form">
            @csrf
            <hr>
            <h1>Create API User</h1>
            
            <div class="section">
                <fieldset class="first">
               <legend><h2>API Information</h2></legend> 
                <label class="name" for="name">Name:</label>
                <input class="name" type="text" id="name" name="name" required>
                <p class="name1">For internal management of multiple API users</p>
            </fieldset>
            </div>
            
            
            <div class="section">
                <fieldset class="second"><legend>
                <h2>API Access</h2></legend>
                <label class="access-type">Access Type:</label>
                <div class="radio-group">
                    <label><input type="radio" name="api_access_type[]" value="Full API Access"> Full API Access</label><br>
                    <label><input type="radio" name="api_access_type[]" value="Custom API Access"> Custom API Access</label><br>
                    <label><input type="radio" name="api_access_type[]" value="3rd Party Integration Access">3rd Party Integration Access</label><br>
                </div>
                </fieldset>
            </div>
            
            <div class="section">
                <fieldset class="third">
                    <legend>
                        <h2>API Method Permissions</h2>
                    </legend>
                    
                <label>Promotional Messaging <button class="button-select-all" onclick="selectAllCheckboxes()">Select All</button></label>
                <div class="checkbox-group">
                    <label><input type="checkbox" name="api_method_permission[]" value="retrieve_segment"> legacy.retrieve_segment</label>
                    <label><input type="checkbox" name="api_method_permission[]" value="group_clear"> legacy.group_clear</label>
                    <label><input type="checkbox" name="api_method_permission[]" value="delete_subscriber"> legacy.delete_subscriber</label>
                    <label><input type="checkbox" name="api_method_permission[]" value="retrieve_active"> legacy.retrieve_active</label>
                    <label><input type="checkbox" name="api_method_permission[]" value="send_campaign"> legacy.send_campaign</label>
                    <label><input type="checkbox" name="api_method_permission[]" value="bulk_sync"> legacy.bulk_sync</label>
                    <label><input type="checkbox" name="api_method_permission[]" value="manage_subscriber"> legacy.manage_subscriber</label>
                    <label><input type="checkbox" name="api_method_permission[]" value="group_rename"> legacy.group_rename</label>
                    <label><input type="checkbox" name="api_method_permission[]" value="message_stats"> legacy.message_stats</label>
                    <label><input type="checkbox" name="api_method_permission[]" value="retrieve_unsub"> legacy.retrieve_unsub</label>
                </div>
            </fieldset>
            </div>
            
            <div class="section">
                <fieldset class="fourth">
                <legend>
                <h2>API IP Whitelist</h2>
                 </legend>
                <div style="display:flex">
                <label class="whitelist" for="api_ip_whitelist">Whitelisted IPs:</label>
                <textarea id="whitelisted_ips" name="api_ip_whitelist" required></textarea>
                </div>
                <p class="name1">Separate each IP with a line break</p>
                </fieldset>
            </div>
            
            <div class="buttons">
                <button type="button" class="cancel">Cancel</button>
                <button type="submit" class="save">Save</button>
            </div>
        </form>
    </div>
    <script>
    function selectAllCheckboxes() {
        var checkboxes = document.querySelectorAll('.checkbox-group input[type="checkbox"]');
        checkboxes.forEach(function(checkbox) {
            checkbox.checked = true;
        });
    }
</script>
</body>
</html>