import { registerBlockType } from '@wordpress/blocks';
import { useBlockProps, InspectorControls, RichText } from '@wordpress/block-editor';
import { PanelBody, SelectControl, TextControl, TextareaControl } from '@wordpress/components';
import HeroBanner from './component';
import './editor.scss';
import './style.scss';

registerBlockType('portfolio/hero', {
  edit: ({ attributes = {
    badge: 'Badge',
    title: 'Hello',
    subtitle: 'Subtitle',
    primaryButton: {
      label: 'Primary Label',
      href: '#',
      target: '_self'
    },
    secondaryButton: {
      label: 'Secondary Label',
      href: '#',
      target: '_self'
    },
  }, setAttributes }: IHeroBannerAttributesState) => {
    const { primaryButton, secondaryButton } = attributes;

    return (
      <>
        <InspectorControls>
          <PanelBody title="Content">
            <TextControl
              label="Badge"
              value={attributes.badge}
              onChange={(value: string) => setAttributes({ badge: value })}
            />
            <TextControl
              label="Title"
              value={attributes.title}
              onChange={(value: string) => setAttributes({ title: value })}
            />
            <TextareaControl
              label="Subtitle"
              value={attributes.subtitle}
              onChange={(value: string) => setAttributes({ subtitle: value })}
            />
          </PanelBody>
          <PanelBody title="Primary Button">
            <TextControl
              label="Label"
              value={primaryButton.label}
              onChange={(value: string) =>
                setAttributes({
                  primaryButton: { ...primaryButton, label: value }
                })
              }
            />
            <TextControl
              label="URL"
              value={primaryButton.href}
              onChange={(value: string) =>
                setAttributes({
                  primaryButton: { ...primaryButton, href: value }
                })
              }
            />
            <SelectControl
              label="Target"
              value={primaryButton.target}
              onChange={(value) =>
                setAttributes({
                  primaryButton: { ...primaryButton, target: value }
                })
              }
              options={[
                { value: "_self", label: "Same Tab" },
                { value: "_blank", label: "New Tab" },
              ]}
            />
          </PanelBody>
          <PanelBody title="Secondary Button">
            <TextControl
              label="Label"
              value={secondaryButton.label}
              onChange={(value) =>
                setAttributes({
                  secondaryButton: { ...secondaryButton, label: value }
                })
              }
            />
            <TextControl
              label="URL"
              value={secondaryButton.href}
              onChange={(value) =>
                setAttributes({
                  secondaryButton: { ...secondaryButton, href: value }
                })
              }
            />
            <SelectControl
              label="Target"
              value={secondaryButton.target}
              onChange={(value) =>
                setAttributes({
                  secondaryButton: { ...secondaryButton, target: value }
                })
              }
              options={[
                { value: "_self", label: "Same Tab" },
                { value: "_blank", label: "New Tab" },
              ]}
            />
          </PanelBody>
        </InspectorControls>
        <div {...useBlockProps()}>
          <HeroBanner attributes={attributes} setAttributes={setAttributes} />
        </div>
      </>
    );
  },
  save: ({ attributes = {} }) => {
    const blockProps = useBlockProps.save();
    return (
      <div {...blockProps}>
        <HeroBanner attributes={attributes} />
      </div>
    );
  },
});
