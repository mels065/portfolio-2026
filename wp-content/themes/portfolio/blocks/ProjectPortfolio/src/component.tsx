export default function ProjectPortfolio({ attributes, setAttributes }: IProjectPortfolioAttributesState) {
  const { title } = attributes;
  const projectsTitle = title || "Recent projects";
  const projects: Array<{ title?: string; description?: string; tags?: string }> = [];

  return (
    <section id="work" className="mx-auto max-w-7xl px-6 py-20 lg:px-8">
      <div className="flex items-end justify-between gap-6">
        <div>
          <p className="text-sm font-semibold uppercase tracking-[0.3em] text-sky-300">Featured work</p>
          <h2 className="mt-2 text-3xl font-semibold text-white">
            {projectsTitle}
          </h2>
        </div>
      </div>

      <div className="mt-10 grid gap-6 lg:grid-cols-3">
        {projects.length > 0 ? (
          projects.map((project, index) => (
            <article
              key={project.title ?? `project-${index}`}
              className="rounded-3xl border border-white/10 bg-slate-900/70 p-6 shadow-lg shadow-slate-950/20"
            >
              <div className="mb-6 h-36 rounded-2xl bg-gradient-to-br from-sky-500/30 via-indigo-500/20 to-fuchsia-500/20" />
              <h3 className="text-xl font-semibold text-white">
                {project.title ?? "Project"}
              </h3>
              <p className="mt-3 text-sm leading-7 text-slate-400">
                {project.description ?? ""}
              </p>

              {project.tags ? (
                <div className="mt-6 flex flex-wrap gap-2">
                  {project.tags.split(",").map((tag, tagIndex) => (
                    <span
                      key={`${tag}-${tagIndex}`}
                      className="rounded-full border border-white/10 px-3 py-1 text-xs uppercase tracking-[0.2em] text-slate-300"
                    >
                      {tag.trim()}
                    </span>
                  ))}
                </div>
              ) : null}
            </article>
          ))
        ) : (
          [0, 1, 2].map((i) => (
            <article
              key={i}
              className="rounded-3xl border border-white/10 bg-slate-900/70 p-6 shadow-lg shadow-slate-950/20"
            >
              <div className="mb-6 h-36 rounded-2xl bg-gradient-to-br from-sky-500/30 via-indigo-500/20 to-fuchsia-500/20" />
              <h3 className="text-xl font-semibold text-white">
                Project
                {i + 1}
              </h3>
              <p className="mt-3 text-sm leading-7 text-slate-400">
                A focused product launch experience with streamlined interactions and a design-forward layout.
              </p>
              <div className="mt-6 flex flex-wrap gap-2">
                <span className="rounded-full border border-white/10 px-3 py-1 text-xs uppercase tracking-[0.2em] text-slate-300">React</span>
                <span className="rounded-full border border-white/10 px-3 py-1 text-xs uppercase tracking-[0.2em] text-slate-300">Tailwind</span>
              </div>
            </article>
          ))
        )}
      </div>
    </section>
  );
}
