<script>
    $('#correction-modal').on('show.bs.modal', function (event) {
        $("textarea[name=text]").val('');
    });

    $('#correction-form').on('submit', function (e) {
        e.preventDefault();

        var formData = {
            text: $("textarea[name=text]").val(),
        }

        var url = "{{ route('add.correction') }}";

        $.ajax({
            method: "POST",
            url: url,
            data: formData,
            success: function(data){
                if(data.status == 'success'){
                    $('#correction-modal').modal('hide');
                    $('#submit-business-success').modal('show');
                }else if(data.status == 'failed'){
                    alert("Error on query!");
                }
            },
            error: function(data){
                var errors = data;
                console.log(errors);
            }
        });
    });
</script>