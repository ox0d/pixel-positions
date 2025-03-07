<x-layout>
    <x-page-heading>New Job</x-page-heading>

    <x-forms.form method="POST" action="{{ route('jobs.store') }}">

        <x-forms.input name="title" placeholder="Job Title" :label="false"/>
        <x-forms.input name="salary" placeholder="Salary" :label="false"/>
        <x-forms.input name="location" placeholder="Location" :label="false"/>
        <x-forms.input name="url" placeholder="Job URL" type="url" :label="false"/>

        <x-forms.select name="schedule" label="Schedule"> 
            <option>Full Time</option>
            <option>Part Time</option>
        </x-forms.select>


        <x-forms.checkbox name="featured" label="Feature (costs extra)"/>

        <x-forms.divider />

        <x-forms.input name="tags" label="Tags (comma separated)" placeholder="Laracasts, Laravel, Vue.js"/>

        <x-forms.button>Publish</x-forms.button>
    </x-forms.form>
</x-layout>