<script>
$(document).ready(function() {
    $("input:radio").attr("checked", false);
    $("#siguiente").attr("disabled", true);
    $('body #radios input').on('click', function() {
        var idCurso = $(this).attr('name');
        var value = $(this).attr('value');
        var pregunta = $("#pregunta").val();
        if ($("input[type=radio]:checked").size() == 5) {
            $("#siguiente").attr("disabled", false);
        }
        $.ajax({
            type: "POST",
            url: "{{ route('res_pregunta', Crypt::encrypt($id)) }}",
            data: {
                valor: value,
                idCurso: idCurso,
                pregunta: pregunta,
                "_token": "{{ csrf_token() }}",
            },
            success: function(res) {
                $("#res").html(res);
            }
        })
    })
})
</script>