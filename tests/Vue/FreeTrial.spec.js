import { mount, shallowMount } from '@vue/test-utils'
import expect from 'expect'
import FreeTrialComponent from '../../resources/js/components/FreeTrialComponent.vue'

describe('FreeTrial', () => {
    let wrapper;

    beforeEach(() => {
        wrapper = mount(FreeTrialComponent);
    });

    it('renders the correct title on the page', () => {
        expect(wrapper.find('.card-title').html()).toContain('Get <strong>3 free downloads</strong> when you start your free trial today.');
    });

    it('contains a blank email field by default', () => {
        expect(wrapper.vm.email).toBe('');
    });

    it('it has a working email field', () => {
        
        const textInput = wrapper.find('input')
        textInput.element.value = 'alice@aol.com'
        textInput.trigger('input')
        expect(wrapper.vm.email).toBe('alice@aol.com');
    });
});