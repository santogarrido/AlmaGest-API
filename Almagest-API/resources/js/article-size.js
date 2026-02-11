document.addEventListener('DOMContentLoaded', function() {
            const radios = document.querySelectorAll('input[name="size_type"]');
            const dependents = {
                number: document.getElementById('size_number'),
                simple: document.getElementById('size_simple'),
                compound: document.getElementById('size_compound')
            };
            const hidden = document.getElementById('size_hidden');

            function updateSize() {
                const selected = document.querySelector('input[name="size_type"]:checked')?.value;
                // Mostrar/ocultar selects
                for (let key in dependents) {
                    dependents[key].style.display = (key === selected) ? 'inline-block' : 'none';
                }

                // Actualizar hidden
                let value = '';
                if (selected === 'number') {
                    value = dependents.number.querySelector('select').value;
                } else if (selected === 'simple') {
                    value = dependents.simple.querySelector('select').value;
                } else if (selected === 'compound') {
                    const w = dependents.compound.querySelector('select[name="size_compound_width"]').value;
                    const h = dependents.compound.querySelector('select[name="size_compound_height"]').value;
                    if(w!="" && h!=""){
                        value = `${w} x ${h}`;
                    }

                }
                hidden.value = value;
            }

            // Detectar cambios en radiobuttons y selects
            radios.forEach(r => r.addEventListener('change', updateSize));
            Object.values(dependents).forEach(d => {
                d.querySelectorAll('select').forEach(s => s.addEventListener('change', updateSize));
            });

            // Inicializa al cargar la página
            updateSize();
        });
