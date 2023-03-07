<script>
    let previousPhone = ''

    function phoneFormat(field) {
        const specialCharCount = (field.value.match(/\D/g) || []).length;
        let cursorPosition = field.selectionStart;

        let input = field.value.replace(/\D/g, '');
        const size = input.length;
        if (input.substring(0, 1) == 1) {
            if (size === 0) {
                input = ``
            } else if (size < 2) {
                input = `+${input} `
            } else if (size < 4) {
                input = `+${input.substring(0,1)} (${input.substring(1)}`
            } else if (size < 8) {
                input = `+${input.substring(0,1)} (${input.substring(1,4)}) ${input.substring(4)}`
            } else if (size < 12) {
                input =
                    `+${input.substring(0,1)} (${input.substring(1,4)}) ${input.substring(4,7)}-${input.substring(7,11)}`
            }
        } else {
            if (size > 7 && size < 11) {
                input = `(${input.substring(0,3)}) ${input.substring(3,6)}-${input.substring(6)}`
            } else if (size > 3 && size < 8) {
                input = `${input.substring(0,3)}-${input.substring(3)}`
            }
        }

        if (input !== previousPhone) {
            previousPhone = input
            const specialCharDiff = (input.match(/\D/g) || []).length - specialCharCount;
            cursorPosition += specialCharDiff

            field.value = input
            field.selectionStart = cursorPosition;
            field.selectionEnd = cursorPosition;
        }
    }
</script>