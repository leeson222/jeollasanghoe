$(function () {
    function isValidPassword(value) {
        return /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,12}$/.test(value);
    }

    $('[data-password-validation]').each(function () {
        const $form = $(this);
        const $password = $form.find('[data-password-input]');
        const $confirm = $form.find('[data-password-confirm]');
        const $hint = $form.find('[data-password-hint]');
        const $passwordError = $form.find('[data-password-error]');
        const $confirmError = $form.find('[data-password-confirm-error]');
        const $confirmSuccess = $form.find('[data-password-confirm-success]');
        const isOptional = $form.is('[data-password-optional]');

        if (!$password.length || !$confirm.length) return;

        function validatePassword() {
            const value = $password.val();
            const hasValue = value.length > 0;
            const isValid = isValidPassword(value);

            $hint.prop('hidden', hasValue && !isValid);
            $passwordError.prop('hidden', !hasValue || isValid);

            return isOptional && !hasValue ? true : isValid;
        }

        function validateConfirm() {
            const password = $password.val();
            const confirm = $confirm.val();
            const hasPassword = password.length > 0;
            const hasConfirm = confirm.length > 0;
            const isMatch = hasConfirm && password === confirm;
            const canShowSuccess = isMatch && isValidPassword(password);

            $confirmError.prop('hidden', !hasConfirm || isMatch);
            $confirmSuccess.prop('hidden', !canShowSuccess);

            if (isOptional && !hasPassword && !hasConfirm) return true;
            return canShowSuccess;
        }

        $password.on('input', function () {
            validatePassword();
            validateConfirm();
        });
        $confirm.on('input', validateConfirm);

        $form.on('submit', function (event) {
            const validPassword = validatePassword();
            const validConfirm = validateConfirm();

            if (!validPassword || !validConfirm) {
                event.preventDefault();
                (!validPassword ? $password : $confirm).trigger('focus');
            }
        });
    });
});
