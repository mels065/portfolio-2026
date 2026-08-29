import { RichText } from '@wordpress/block-editor';

export default function RichTextWrapper({ tagName, value, onChange, placeholder }) {
    return (
        onChange ? (
            <RichText
                tagName={tagName}
                value={value}
                onChange={onChange}
                placeholder={placeholder}
            />
        ) : (
            <RichText.Content
                tagName={tagName}
                value={value}
            />
        )
    );
}
