
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="//cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.tiny.cloud/1/rua2egwdkoe2z6f6t20i8n0vowy8vvc2hxi5frw2jmzrmq3v/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
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

<script type="text/javascript">
    $(document).ready(function(){
        $(".search-input").on('keyup', function(){
            var _q=$(this).val();
            if(_q.length>=1){
                $.ajax({
                    url:"{{url('search')}}",
                    data:{
                        q:_q
                    },
                    dataType:'json',
                    beforeSend:function(){
                        $(".search-result").html('<li class="list-group-item">Loading...</li>')
                    },
                    success:function(res){
                        // console.log(res);
                       var _html='<div class="row >';
                       $.each(res.data, function(index, data){
                            _html += '<div class="card p-4"> <h4 class="text-danger fw-bold">Title:'+data.title+'</h4><img class="col-md-6 p-2" height="300px" width="100px" src="/storage/educ_photo/'+data.cover_image+'"';
                            _html +='<p></p>';
                            _html += '<h5 class="text-info fw-bold">Author:'+data.Author+'</h5>';
                            _html += '<h5 class="text-info fw-bold">Type:'+data.type+'</h5>';
                            _html += '<p  class="">Description:'+data.description+'</p>';
                            _html += '<div class="float-right"><a href="{{route('download','1')}}" class="btn btn-primary float-right col-md-2 mb-5">Download</a></div> ';
                            _html +='</hr> </div>';
                       });
                        _html  +='</div>';
                        $(".search-result").html(_html);
                    }
                })
            }
        });
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
