@props(['name'])

@error($name)
    <p class=" text-sm/6 text-red-500 font-semibold italic"> {{ $message }} </p>
@enderror
