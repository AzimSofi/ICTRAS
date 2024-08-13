<script type="module">
    document.querySelectorAll('form[data-confirm]').forEach(form => {
        const dropdown = form.querySelector('select[name="department_id"]');
        const saveButton = form.querySelector('button[type="submit"]');
        let originalValue = dropdown.value;  // Store the initial value

        // Function to handle dropdown changes
        function handleDropdownChange() {
            if (dropdown.value !== originalValue) {
                saveButton.style.display = 'inline-block';
            } else {
                saveButton.style.display = 'none';
            }
        }

        // Attach the change event to the dropdown
        dropdown.addEventListener('change', handleDropdownChange);

        form.addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent immediate submission

            Swal.fire({
                title: "Do you want to save the changes?",
                showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: "Save",
                denyButtonText: `Don't save`
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit(); // Submit the form if confirmed
                } else if (result.isDenied) {
                    Swal.fire("Changes are not saved", "", "info");
                    dropdown.value = originalValue; // Revert dropdown to original value
                    saveButton.style.display = 'none'; // Hide the save button
                }
            });
        });
    });
</script>
