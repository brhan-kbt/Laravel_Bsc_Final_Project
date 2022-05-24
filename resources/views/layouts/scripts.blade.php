
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
<script src="//cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.tiny.cloud/1/pgbw95hh8z8fq85pm0bvuwgdvc553hj53x8p9fgh98o7axvn/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

<script>
    $(document).ready( function () {
    $('#myTable').DataTable();
    } );

    $(document).ready(function(){

        $('#ad_form').on('click', function(){
                var html =`<tr>
                    <div class="row">
                        <td>2</td>
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
            $('tbody').append(html);
        });
    });

    $(document).on('click','#re_form', function(){
                $(this).closest('tr').remove();
        });

</script>

@stack('scripts')

<script>
    $(document).ready( function () {
    // $('#myTable').DataTable();

     tinymce.init({
        selector: '#mytextarea',
        plugins: [
          'a11ychecker','advlist','advcode','advtable','autolink','checklist','export',
          'lists','link','image','charmap','preview','anchor','searchreplace','visualblocks',
          'powerpaste','fullscreen','formatpainter','insertdatetime','media','table','help','wordcount'
        ],
        toolbar: 'undo redo | formatpainter casechange blocks | bold italic backcolor | ' +
          'alignleft aligncenter alignright alignjustify | ' +
          'bullist numlist checklist outdent indent | removeformat | a11ycheck code table help'
      });

} );

</script>
<script>
    function sendMarkRequest(id = null) {
        return $.ajax("{{ route('markNotification') }}", {
            method: 'POST',
            data: {
                _token,
                id
            }
        });
    }
    $(function() {
        $('.mark-as-read').click(function() {
            let request = sendMarkRequest($(this).data('id'));
            request.done(() => {
                $(this).parents('div.alert').remove();
            });
        });
        $('#mark-all').click(function() {
            let request = sendMarkRequest();
            request.done(() => {
                $('div.alert').remove();
            })
        });
    });
    </script>
    <script src="{{ asset('js/custom.js') }}" defer></script>
    {{-- <script>CKEDITOR.replace( 'mytextarea' );</script> --}}
    <script src="{{asset('js/app.js')}}"></script>

</body>
</html>
