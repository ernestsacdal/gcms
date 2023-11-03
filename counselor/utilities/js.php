<script>
        $(document).ready(function() 
        {
            $('.delBtn').on('click', function()
            {
                $('#mdlDocu').modal('show');

                    $tr = $(this).closest('tr')

                    var data = $tr.children("td").map(function() 
                    {
                        return $(this).text();
                    }).get();

                    console.log(data);

                    $('#docuID').val(data[0]);
                    $('#docstID').val(data[1]);
            });
        });
    </script>

<script>
        $(document).ready(function() 
        {
            $('.accBtn').on('click', function()
            {
                $('#mdlDocuAcc').modal('show');

                    $tr = $(this).closest('tr')

                    var data = $tr.children("td").map(function() 
                    {
                        return $(this).text();
                    }).get();

                    console.log(data);

                    $('#docuIDAcc').val(data[0]);
                    $('#docAstID').val(data[1]);
            });
        });
    </script>

<script>
        $(document).ready(function() 
        {
            $('.delBtnn').on('click', function()
            {
                $('#mdlApp').modal('show');

                    $tr = $(this).closest('tr')

                    var data = $tr.children("td").map(function() 
                    {
                        return $(this).text();
                    }).get();

                    console.log(data);

                    $('#appID').val(data[0]);
                    $('#appstIDR').val(data[1]);
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

                    $('#appIDAcc').val(data[0]);
                    $('#appstIDA').val(data[1]);
                    $('#avid').val(data[2]);
            });
        });
    </script>

<script>
    function trimInputValue(input) {
        input.value = input.value.trim();
    }
</script>

