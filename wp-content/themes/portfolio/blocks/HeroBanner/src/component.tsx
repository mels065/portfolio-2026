import Button from "../../elements/Button";

export default function HeroBanner({ attributes, setAttributes }: IHeroBannerAttributesState) {
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
                  <Button button={primaryButton} />
                  <Button button={secondaryButton} variant="secondary" />
                </div>
            </div>
        </div>
    </section>
  )
}