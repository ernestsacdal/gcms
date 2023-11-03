<script>
    function showDependentId(val) {
        if (val == "Yes - ID Number: ") {
            document.getElementById('dependent-id').style.display = 'block';
        } else {
            document.getElementById('dependent-id').style.display = 'none';
        }
    }
</script>

<script>
    function showSoloId(val) {
        if (val == "Yes - ID Number: ") {
            document.getElementById('solo-id').style.display = 'block';
        } else {
            document.getElementById('solo-id').style.display = 'none';
        }
    }
</script>

<script>
    function showPwdId(val) {
        if (val == "Yes - ID Number: ") {
            document.getElementById('pwd-id').style.display = 'block';
        } else {
            document.getElementById('pwd-id').style.display = 'none';
        }
    }
</script>

<script>
    function showIndiSpecify(val) {
        if (val == "Yes - Group name: ") {
            document.getElementById('indi-specify').style.display = 'block';
        } else {
            document.getElementById('indi-specify').style.display = 'none';
        }
    }
</script>

<script>
    function toggleTextBox() {
        var select = document.getElementsByName("strand")[0];
        var otherStrandDiv = document.getElementById("other-strand");

        if (select.value === "Other") {
            otherStrandDiv.style.display = "block";
        } else {
            otherStrandDiv.style.display = "none";
        }
    }
</script>

<script>
    function showTextbox() {
        var selectBox = document.getElementsByName("docu")[0];
        var selectedOption = selectBox.options[selectBox.selectedIndex].value;
        if (selectedOption == "Other") {
            document.getElementById("other-docu").style.display = "block";
        } else {
            document.getElementById("other-docu").style.display = "none";
        }
    }
</script>

<script>
    function trimInputValue(input) {
        input.value = input.value.trim();
    }
</script>

<script>
    function showTextboxx() {
        var selectBox = document.getElementsByName("counseling")[0];
        var selectedOption = selectBox.options[selectBox.selectedIndex].value;
        if (selectedOption == "Other") {
            document.getElementById("other-counseling").style.display = "block";
        } else {
            document.getElementById("other-counseling").style.display = "none";
        }
    }
</script>

<script>
    function toggleTextBoxxx() {
        var select = document.getElementsByName("reason")[0];
        var otherStrandDiv = document.getElementById("other-leave");

        if (select.value === "Other") {
            otherStrandDiv.style.display = "block";
        } else {
            otherStrandDiv.style.display = "none";
        }
    }
</script>

<script>
    var inputFields = document.getElementsByClassName("quantity-input");
    for (var i = 0; i < inputFields.length; i++) {
        inputFields[i].addEventListener("input", function() {
            if (this.value < this.min) {
                this.value = this.min;
            } else if (this.value > this.max) {
                this.value = this.max;
            }
        });
    }
</script>



