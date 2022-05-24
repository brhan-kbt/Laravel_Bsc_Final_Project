<script>
$(document).ready(function () {
    $("#myTable").DataTable();
});

$(document).ready(function () {
    $("#add_form").on("click", function () {
        alert("");
         var html = `<tr>
                     <div class="row">
                         <td>1</td>
                         <td>
                             <input type="text" name="familyfullname1[]" class="form-control" id="familyfullname1" placeholder="">
                         </td>

                         <td>
                              <input type="number" name="familyage1[]" class="form-control" id="familyage1" placeholder="">
                         </td>

                         <td>
                             <input type="text" name="familydob1[]" class="form-control " id="familydob1" placeholder="01/01/2022">
                         </td>

                         <td>
                             <select class="form-select" name="relationship[]" aria-label="Default select example">
                             <option selected></option>
                             <option value="Wife">Wife</option>
                             <option value="Son">Son</option>
                             <option value="Daughter">Daughter</option>
                             </select>
                         </td>
                         <td><button id="re_form" type="button" class="btn-danger fa fa-remove"></button></td>
                     </div>{{--End of  row table--}}
                 </tr>`;
         $("tbody").append(html);
    });
});

$(document).on("click", "#re_form", function () {
    $(this).closest("tr").remove();
});

</script>