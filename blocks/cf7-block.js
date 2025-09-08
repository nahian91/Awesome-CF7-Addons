const { registerBlockType } = wp.blocks;
const { SelectControl } = wp.components;
const { useState, useEffect } = wp.element;
const { InspectorControls } = wp.blockEditor;

registerBlockType('acf7/cf7-form',{
    title:'CF7 Form',
    icon:'forms',
    category:'widgets',
    attributes:{ formId:{ type:'number' } },

    edit:(props)=>{
        const { attributes, setAttributes } = props;
        const [forms,setForms]=useState([]);

        useEffect(()=>{
            fetch(ajaxurl+'?action=acf7_get_forms')
            .then(res=>res.json())
            .then(data=>setForms(data));
        },[]);

        return (
            <InspectorControls>
                <SelectControl
                    label="Select CF7 Form"
                    value={attributes.formId}
                    options={forms.map(f=>({label:f.title,value:f.id}))}
                    onChange={value=>setAttributes({formId:parseInt(value)})}
                />
            </InspectorControls>
        );
    },

    save:()=>{ return null; }
});
