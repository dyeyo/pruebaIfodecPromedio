$(function () {
  $("#frmAdd").validate({
    rules: {
      nombre: {
        required: true,
        lettersonly: true
      },
      parcial1: {
        required: true,
        number: true,
      },
      parcial2: {
        required: true,
        number: true,
      },
      parcial3: {
        required: true,
        number: true,
      }
    },
    // Specify the validation error messages
    messages:
    {
      nombre: {
        required: "this field required"
      },
      parcial1: {
        required: 'Este campo es obligatorio',
        number: 'Solo se permite numeros'
      },
      parcial2: {
        required: 'Este campo es obligatorio',
        number: 'Solo se permite numeros'
      },
      parcial3: {
        required: 'Este campo es obligatorio',
        number: 'Solo se permite numeros'
      }
    }
  });
});