@props(['disabled' => false, 'options' => []])

<select {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm']) !!}>
    @foreach ($allRoles as $role)
        <option value="{{ $role->name }}">{{ $role->name }}</option>
    @endforeach
</select>