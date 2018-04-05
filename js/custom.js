$(function() {
        var scntDiv = $('#activities');
        var i = $('#activities .inrow').size() + 1;
        
      
        $('#addScnt').on('click', function() {
                $('<div id="inrow"><div class="input-field col s10"><input type="text" name="activities_description[]" value="" id="activities_description[]" class="validate" required="required"><label for="strategies" class="">Activity Description</label></div><div class="input-field col s2"><a href="#" class="btn-floating waves-effect waves-light red" onclick="removeRow(\'' + i + '\');return false;"><i class="mdi-content-clear"></i></a></div></div>').appendTo(scntDiv);
                i++;
                return false;
        });



        var img_path = $('#img_path');
        var j = $('#img_path .img_row').size() + 1;
        
      
        $('#addImg').on('click', function() {
                $('<div id="img_row"><div class="img_row"><div class="file-field input-field col s10"><input class="file-path validate" type="text" name="img_name[]" /><div class="waves-effect waves-light purple btn"><span>Image</span><input type="file" name="image_path[]" id="image_path[]" /></div></div><div class="input-field col s2"><a href="#" class="btn-floating waves-effect waves-light red" onclick="removeImg(\'' + j + '\');return false;"><i class="mdi-content-clear"></i></a></div></div></div>').appendTo(img_path);
                j++;
                return false;
        });
});
