import { registerBlockType } from '@wordpress/blocks';
import { useBlockProps, RichText } from '@wordpress/block-editor';
import RichTextWrapper from "../../utils/wrapper/RichTextWrapper";
import './editor.scss';
import './style.scss';

registerBlockType('portfolio/hero', {
  edit: ({ attributes = {
    badge: 'Badge',
    title: 'Hello',
    subtitle: 'Subtitle',
    primaryLabel: 'Primary Label',
    secondaryLabel: 'Secondary Label'
  }, setAttributes }) => {
    return (
      <div {...useBlockProps({ className: "bg-red" })}>
        <HeroBanner attributes={attributes} setAttributes={setAttributes} />
      </div>
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
  const { badge, title, subtitle, primaryLabel, secondaryLabel } = attributes;
  return (
    <section className="relative overflow-hidden">
        <div className="absolute inset-0 -z-10 bg-[radial-gradient(circle_at_top_left,_rgba(59,130,246,0.24),_transparent_45%)]"></div>
        <div className="mx-auto grid max-w-7xl gap-12 px-6 py-20 lg:grid-cols-[1.2fr_0.8fr] lg:px-8 lg:py-28">
            <div className="max-w-3xl">
                {
                  badge && (
                    <RichTextWrapper
                      tagName="p"
                      value={badge}
                      onChange={setAttributes ? (value) => setAttributes({ badge: value }) : null}
                      placeholder="Badge..."
                    />
                  )
                }
                {
                  title && (
                    <RichTextWrapper
                      tagName="h1"
                      value={title}
                      onChange={setAttributes ? (value) => setAttributes({ title: value }) : null}
                      placeholder="Title..."
                    />
                  )
                }
                {
                  subtitle && (
                    <RichTextWrapper
                      tagName="p"
                      value={subtitle}
                      onChange={setAttributes ? (value) => setAttributes({ subtitle: value }) : null}
                      placeholder="Description..."
                    />
                  )
                }
                <div className="mt-8 flex flex-wrap gap-4">
                  <a href="<?php echo esc_url($hero_primary_url); ?>" className="rounded-full bg-white px-6 py-3 text-sm font-semibold text-slate-950 transition hover:bg-slate-200">
                    <RichTextWrapper
                      tagName="span"
                      value={primaryLabel}
                      onChange={setAttributes ? (value) => setAttributes({ primaryLabel: value }) : null}
                      placeholder="Primary button label..."
                    />
                  </a>
                  <a href="<?php echo esc_url($hero_secondary_url); ?>" className="rounded-full border border-white/20 px-6 py-3 text-sm font-semibold text-white transition hover:bg-white/10">
                    <RichTextWrapper
                      tagName="span"
                      value={secondaryLabel}
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
