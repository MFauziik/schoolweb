export default function ApplicationLogo(props) {
    return (
        <div {...props} className={"flex items-center gap-2 " + props.className}>
            <div className="w-10 h-10 bg-gradient-to-tr from-primary-600 to-indigo-600 rounded-xl flex items-center justify-center shadow-lg shadow-primary-500/20">
                <svg className="w-6 h-6 text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2.5" strokeLinecap="round" strokeLinejoin="round">
                    <path d="M22 10v6M2 10l10-5 10 5-10 5z" />
                    <path d="M6 12v5c3 3 9 3 12 0v-5" />
                </svg>
            </div>
            <span className="text-xl font-bold tracking-tight text-slate-800">
                Smarter<span className="text-primary-600">School</span>
            </span>
        </div>
    );
}
