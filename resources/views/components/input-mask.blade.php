<input type="{{ $type ?? 'text' }}" name="{{ $name }}" class="form-control {{ $class ?? '' }}"
       style="text-transform: uppercase;"
       oninput="this.value = this.value.toUpperCase()"
       placeholder="{{ $placeholder ?? '' }}"
       @if($name === 'cpf')
           pattern="\d{3}\.\d{3}\.\d{3}-\d{2}"
           inputmode="numeric"
           oninput="this.value = this.value.replace(/\D/g, '')
                               .replace(/^(\d{3})(\d)/, '$1.$2')
                               .replace(/^(\d{3})\.(\d{3})(\d)/, '$1.$2.$3')
                               .replace(/^(\d{3})\.(\d{3})\.(\d{3})(\d)/, '$1.$2.$3-$4')"
           maxlength="14"
       @endif
       required>
