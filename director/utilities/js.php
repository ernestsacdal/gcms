<script>
    function trimInputValue(input) {
        input.value = input.value.trim();
    }
</script>

<script>
        $(document).ready(function() 
        {
            $('.delBtn').on('click', function()
            {
                $('#mdlSigRej').modal('show');

                    $tr = $(this).closest('tr')

                    var data = $tr.children("td").map(function() 
                    {
                        return $(this).text();
                    }).get();

                    console.log(data);

                    $('#IDrej').val(data[0]);
                    $('#STIDrej').val(data[1]);
            });
        });
    </script>

<script>
        $(document).ready(function() 
        {
            $('.accBtnn').on('click', function()
            {
                $('#mdlAppAcc').modal('show');

                    $tr = $(this).closest('tr')

                    var data = $tr.children("td").map(function() 
                    {
                        return $(this).text();
                    }).get();

                    console.log(data);

                    $('#IDacc').val(data[0]);
                    $('#STIDacc').val(data[1]);
            });
        });
    </script>