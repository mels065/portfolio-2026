import { registerBlockType } from '@wordpress/blocks';
import { useBlockProps, InspectorControls, RichText } from '@wordpress/block-editor';
import { PanelBody, TextControl, TextareaControl } from '@wordpress/components';
import RichTextWrapper from "../../utils/wrapper/RichTextWrapper";
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
  }, setAttributes }) => {
    const { primaryButton, secondaryButton } = attributes;

    return (
      <>
        <InspectorControls>
          <PanelBody title="Hero settings">
            <TextControl
              label="Primary button URL"
              value={primaryButton.href}
              onChange={(value) =>
                setAttributes({
                  primaryButton: { ...primaryButton, href: value }
                })
              }
            />
            <TextControl
              label="Primary button Target"
              value={primaryButton.target}
              onChange={(value) =>
                setAttributes({
                  primaryButton: { ...primaryButton, target: value }
                })
              }
            />
            <TextControl
              label="Secondary button URL"
              value={secondaryButton.href}
              onChange={(value) =>
                setAttributes({
                  secondaryButton: { ...secondaryButton, href: value }
                })
              }
            />
            <TextControl
              label="Secondary button Target"
              value={secondaryButton.target}
              onChange={(value) =>
                setAttributes({
                  secondaryButton: { ...secondaryButton, target: value }
                })
              }
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

function HeroBanner({ attributes, setAttributes }) {
  const { badge, title, subtitle, primaryButton, secondaryButton } = attributes;
  return (
    <section className="relative overflow-hidden">
        <div className="absolute inset-0 -z-10 bg-[radial-gradient(circle_at_top_left,_rgba(59,130,246,0.24),_transparent_45%)]"></div>
        <div className="mx-auto grid max-w-7xl gap-12 px-6 py-20 lg:grid-cols-[1.2fr_0.8fr] lg:px-8 lg:py-28">
            <div className="max-w-3xl">
                {
                  badge && (
                    <div className="mb-5 inline-flex rounded-full border border-sky-400/30 bg-sky-400/10 px-4 py-2 text-sm font-medium text-sky-300">
                      <RichTextWrapper
                        tagName="span"
                        value={badge}
                        onChange={setAttributes ? (value) => setAttributes({ badge: value }) : null}
                        placeholder="Badge..."
                      />
                    </div>
                  )
                }
                {
                  title && (
                    <div className="text-4xl font-semibold tracking-tight text-white sm:text-5xl lg:text-6xl">
                      <RichTextWrapper
                        tagName="h1"
                        value={title}
                        onChange={setAttributes ? (value) => setAttributes({ title: value }) : null}
                        placeholder="Title..."
                      />
                    </div>
                  )
                }
                {
                  subtitle && (
                    <div className="mt-6 max-w-2xl text-lg leading-8 text-slate-300">
                      <RichTextWrapper
                        tagName="p"
                        value={subtitle}
                        onChange={setAttributes ? (value) => setAttributes({ subtitle: value }) : null}
                        placeholder="Description..."
                      />
                    </div>
                  )
                }
                <div className="mt-8 flex flex-wrap gap-4">
                  <a href={primaryButton.href} target={primaryButton.target} className="rounded-full bg-white px-6 py-3 text-sm font-semibold text-slate-950 transition hover:bg-slate-200">
                    <RichTextWrapper
                      tagName="span"
                      value={primaryButton.label}
                      onChange={setAttributes ? (value) => setAttributes({ primaryLabel: value }) : null}
                      placeholder="Primary button label..."
                    />
                  </a>
                  <a href={secondaryButton.href} target={secondaryButton.target} className="rounded-full border border-white/20 px-6 py-3 text-sm font-semibold text-white transition hover:bg-white/10">
                    <RichTextWrapper
                      tagName="span"
                      value={secondaryButton.label}
                      onChange={setAttributes ? (value) => setAttributes({ secondaryLabel: value }) : null}
                      placeholder="Secondary button label..."
                    />
                  </a>
                </div>
            </div>
        </div>
    </section>
  )
}
